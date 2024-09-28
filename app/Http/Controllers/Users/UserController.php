<?php

namespace App\Http\Controllers\Users;

use Arr;
use Auth;
use Redirect;
use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Users\User;
use App\Models\Commons\Phone;
use App\Models\Commons\Address;
use App\Models\Commons\Demographic;
use App\Http\Controllers\Controller;
use App\Models\Commons\EmailAddress;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.users.edit', ['user' => Auth::user()]);
    }

    /**
     * @return View
     */
    public function show(): View
    {
        $users = User::whereIsActive(true)
            ->whereIsProvider(false)
            ->whereNot('username', Auth::user()->username)
            ->with('demographic', 'demographic.email_address', 'demographic.address', 'demographic.phone',
                'demographic.cellphone')
            ->join('demographics', 'demographics.id', '=', 'users.demographic_id')
            ->orderBy('demographics.last_name')
            ->orderBy('demographics.first_name')
            ->orderBy('demographics.middle_name')
            ->select('users.*')
            ->paginate(config('carevise.pagination.size'));

        return view('pages.users.list', compact('users'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('pages.users.create');
    }

    /**
     * @param  UserStoreRequest  $request
     * @return RedirectResponse
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        // Defaults
        $status = 'warning';
        $message = __('There was an issue creating the new user. Please try again later.');
        // Validated info
        $user_data = Arr::except(
            $request->validated(),
            ['password_confirmation', 'demographic']
        );
        $demographic_data = Arr::except(
            $request->validated('demographic'),
            ['email_address', 'address', 'phone', 'cellphone']
        );
        $email_data = $request->validated('demographic.email_address');
        $address_data = $request->validated('demographic.address');
        $phone_data = $request->validated('demographic.phone');
        $cellphone_data = $request->validated('demographic.cellphone');
        // Pre-format
        $demographic_data['birthdate'] = Carbon::parse($demographic_data['birthdate'])->format(config('carevise.formats.db_datetime'));
        // Create the validated info
        $email_info = EmailAddress::factory()->create($email_data);
        $address_info = Address::factory()->create($address_data);
        $phone_info = Phone::factory()->create($phone_data);
        $cellphone_info = Phone::factory()->create($cellphone_data);
        $demographic_info = Demographic::factory()->create(
            array_merge(
                $demographic_data,
                [
                    'email_address_id' => $email_info->id,
                    'address_id' => $address_info->id,
                    'phone_id' => $phone_info->id,
                    'cellphone_id' => $cellphone_info->id,
                ]
            )
        );
        $user = User::whereUsername($user_data['username'])->firstOrNew(
            array_merge(
                $user_data,
                ['demographic_id' => $demographic_info->id]
            )
        );
        if ($user->save()) {
            $status = 'success';
            $message = __('User <strong>:user</strong> has been created!.',
                ['user' => $user->demographic->complete_name]);
        }
        // Response
        return Redirect::route('user.profile.edit', ['user' => $user])->with($status, $message);
    }

    /**
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('pages.users.edit', compact('user'));
    }

    /**
     * @param  UserUpdateRequest  $request
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request): RedirectResponse
    {
        // Defaults
        $status = 'warning';
        $message = __(
            'There was an issue updating <strong>:username</strong>\'s profile information. Please try again later.',
            [
                'username' => $request->user()->demographic->complete_name ?? ($request->user()->username ?? $request->validated('username'))
            ]
        );
        // Validated info
        $user_data = $request->safe()->except(['demographic']);
        $demographic_data = $request->validated('demographic');
        $email_data = $request->validated('demographic.email_address');
        $address_data = $request->validated('demographic.address');
        $phone_data = $request->validated('demographic.phone');
        $cellphone_data = $request->validated('demographic.cellphone');
        // Pre-format
        $demographic_data['birthdate'] = Carbon::parse($demographic_data['birthdate'])->format(config('carevise.formats.db_datetime'));
        // Get the user being updated
        $user = User::whereUsername($user_data['username'])->firstOrFail();
        // Update the validated info
        if (
            $user->update($user_data) &&
            $user->demographic->update($demographic_data) &&
            $user->demographic->email_address->update($email_data) &&
            $user->demographic->address->update($address_data) &&
            $user->demographic->phone->update($phone_data) &&
            $user->demographic->cellphone->update($cellphone_data)
        ) {
            // If the user is being de-activated
            if (!$request->validated('is_active')) {
                $status = 'info';
                $message = __('The user <strong>:username</strong>\'s has been de-activated.',
                    [
                        'username' => $user->demographic->complete_name ?? ($user->username ?? $request->validated('username'))
                    ]
                );
            } else {
                $status = 'success';
                $message = __('<strong>:username</strong>\'s profile information has been updated successfully!',
                    [
                        'username' => $user->demographic->complete_name ?? ($user->username ?? $request->validated('username'))
                    ]
                );
            }
        }
        // Response
        return Redirect::route('user.list')->with($status, $message);
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        abort(404);
    }
}
