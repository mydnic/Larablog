<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFirstAdminRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function storeAdminUser(CreateFirstAdminRequest $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->superuser = true;
        $user->username = 'Admin';
        $user->save();

        Auth::login($user);

        return redirect()->route('admin.home');
    }
}
