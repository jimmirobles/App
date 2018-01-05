<?php

namespace CRM\Http\Controllers\Auth;

use Auth;
use CRM\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('login.index');
    }

    public function login()
    {
        $credentials = $this->validate(request(), [
            'email'     => 'email|required|string',
            'password'  => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        }
        return back()->withInput(request(['email']));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
