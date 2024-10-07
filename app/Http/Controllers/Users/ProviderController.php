<?php

namespace App\Http\Controllers\Users;

use DB;
use Arr;
use Auth;
use Redirect;
use Illuminate\View\View;
use App\Models\Users\User;
use App\Models\Commons\Phone;
use App\Models\Users\Provider;
use App\Models\Commons\Address;
use App\Models\Commons\Demographic;
use App\Http\Controllers\Controller;
use App\Models\Commons\EmailAddress;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Users\ProviderStoreRequest;
use App\Http\Requests\Users\ProviderUpdateRequest;

class ProviderController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $providers = Provider::with('user', 'user.demographic', 'user.demographic.email_address',
            'user.demographic.address',
            'user.demographic.phone',
            'user.demographic.cellphone')
            ->paginate(config('carevise.pagination.size'));

        return view('pages.providers.list', compact('providers'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('pages.providers.create');
    }

    /**
     * @param  ProviderStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(ProviderStoreRequest $request): RedirectResponse
    {
        // Defaults
        DB::beginTransaction();
        $status = 'warning';
        $message = __('There was an issue creating the new provider. Please try again later.');
        // Validated info
        $provider_data = Arr::except($request->validated(), ['user']);
        $user_data = Arr::except($request->validated('user'), ['password_confirmation', 'demographic']);
        $demographic_data = Arr::except(
            $request->validated('user.demographic'),
            ['email_address', 'address', 'phone', 'cellphone']
        );
        $email_data = $request->validated('user.demographic.email_address');
        $address_data = $request->validated('user.demographic.address');
        $phone_data = $request->validated('user.demographic.phone');
        $cellphone_data = $request->validated('user.demographic.cellphone');
        // Create the validated info
        try {
            $email = EmailAddress::create($email_data);
            $address = Address::create($address_data);
            $phone = Phone::create($phone_data);
            $cellphone = Phone::create($cellphone_data);
            $demographic = Demographic::create(
                array_merge(
                    $demographic_data,
                    [
                        'email_address_id' => $email->id,
                        'address_id' => $address->id,
                        'phone_id' => $phone->id,
                        'cellphone_id' => $cellphone->id,
                    ]
                )
            );
            $user = User::create(array_merge($user_data, ['demographic_id' => $demographic->id]));
            $provider = Provider::create(array_merge($provider_data, ['user_id' => $user->id]));
            DB::commit();
            if ($provider && $user && $demographic && $email && $address && $phone && $cellphone) {
                $status = 'success';
                $message = __(
                    'Provider <strong>:user</strong> has been created!.',
                    ['user' => $user->demographic->complete_name]
                );
                return Redirect::route('provider.profile.edit', ['user' => $user])->with($status, $message);
            }
            // Response
            return Redirect::back()->with($status, $message);
        } catch (\Exception $e) {
            DB::rollBack();
            // Response
            return Redirect::back()->with($status, $message);
        }
    }

    /**
     * @param  Provider  $provider
     * @return void
     */
    public function show(Provider $provider): void
    {
        abort(404);
    }

    /**
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        $provider = $user->provider;
        return view('pages.providers.edit', compact('provider'));
    }

    /**
     * @param  ProviderUpdateRequest  $request
     * @return RedirectResponse
     */
    public function update(ProviderUpdateRequest $request): RedirectResponse
    {
        // Defaults
        DB::beginTransaction();
        $status = 'warning';
        $message = __(
            'There was an issue updating <strong>:username</strong>\'s provider information. Please try again later.',
            [
                'username' => $request->provider->user->demographic->complete_name ?? ($request->provider->user->username ?? $request->validated('username'))
            ]
        );
        // Validated info
        $provider_data = Arr::except($request->validated(), ['user']);
        $user_data = Arr::except($request->validated('user'), ['demographic']);
        $demographic_data = Arr::except(
            $request->validated('user.demographic'),
            ['email_address', 'address', 'phone', 'cellphone']
        );
        $email_data = $request->validated('user.demographic.email_address');
        $address_data = $request->validated('user.demographic.address');
        $phone_data = $request->validated('user.demographic.phone');
        $cellphone_data = $request->validated('user.demographic.cellphone');
        // Get the user being updated
        try {
            $user = User::whereUsername($user_data['username'])->firstOrFail();
            // Update the validated info
            DB::commit();
            if (
                $user->provider->update($provider_data) &&
                $user->update($user_data) &&
                $user->demographic->update($demographic_data) &&
                $user->demographic->email_address->update($email_data) &&
                $user->demographic->address->update($address_data) &&
                $user->demographic->phone->update($phone_data) &&
                $user->demographic->cellphone->update($cellphone_data)
            ) {
                // If the user is being de-activated
                if (!$request->validated('user.is_active') && !$user->is_active) {
                    $status = 'info';
                    $message = __('The provider <strong>:username</strong>\'s has been de-activated.',
                        [
                            'username' => $user->demographic->complete_name ?? ($user->username ?? $request->validated('username'))
                        ]
                    );
                } else {
                    $status = 'success';
                    $message = __('<strong>:username</strong>\'s provider information has been updated successfully!',
                        [
                            'username' => $user->demographic->complete_name ?? ($user->username ?? $request->validated('username'))
                        ]
                    );
                }
            }

            // Response
            if ($user->username === Auth::user()->username) {
                return Redirect::route('provider.profile.edit')->with($status, $message);
            }
            return Redirect::route('provider.list')->with($status, $message);
            // Response

        } catch (\Exception $e) {
            DB::rollBack();
            // Response
            return Redirect::route('provider.list')->with($status, $message);
        }
    }

    /**
     * @param  Provider  $provider
     * @return void
     */
    public function destroy(Provider $provider): void
    {
        abort(404);
    }
}
