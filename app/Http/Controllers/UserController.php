<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;


use App\Models\User;


class UserController extends Controller
{
  
     /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeLogin(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return view('dashboard');
    }

    public function dashboard()
    {
        if(Auth::user()){
            return view('dashboard', []);
        }
        return redirect()->route('login');

    }
}
