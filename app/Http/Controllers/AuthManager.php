<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login() {
        return view('login');
    }

    function registration() {
        return view('registration');
    }

    function loginPost(Request $request ) {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('movies.index'));
        }

        return redirect(route('login'))->with('error', 'Login details are not valid');
    }

    function registrationPost(Request $request ) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['full_name'] = "";
        $user = User::create($data);

        if(!$user) {
            return redirect(route('registration'))->with('error', 'Registration failed, try again');
        }

        return redirect(route('login'))->with('success', 'Registration success, Login to access the Web');

    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}
