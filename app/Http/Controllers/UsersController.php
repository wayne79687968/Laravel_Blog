<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('admin.users.profile', ['user' => $user]);
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
        Session::flash('user_update_message', 'User profile was updated');

        return back();
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    public function delete(User $user, Request $request)
    {
        // $this->authorize('delete', $user);

        $user->delete();
        //Session::flash('message', 'Post was deleted');
        $request->session()->flash('user_delete_message', 'User "' . $user->username . '" was deleted');
        return back();
    }
}
