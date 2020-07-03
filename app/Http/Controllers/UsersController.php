<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('admin.users.profile', ['user'=>$user]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' =>['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['mimes:jpg,jpeg,png'],
            // 'password' => ['min:8', 'max:255', 'confirmed'],
        ]);
        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images', ['disk' => 'public']);
        }
        $user->update($inputs);

        return back();
    }
}
