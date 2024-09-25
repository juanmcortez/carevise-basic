<?php

namespace App\Http\Controllers\Users;

use Auth;
use Illuminate\View\View;
use App\Models\Users\User;
use App\Http\Controllers\Controller;

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
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('pages.users.edit', compact('user'));
    }

    /**
     * @return void
     */
    public function update():void
    {
        abort(404);
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        abort(404);
    }
}
