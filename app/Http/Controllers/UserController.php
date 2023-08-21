<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use File;


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
            if((Auth::user()->role) == 1){
                return view('admin.dashboard');
            }else{
                return view('dashboard');
            }
        }
        return redirect()->route('login');

    }
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        
        return view('profile', [
            'user' => $user
        ]);

    }
    public function editProfile(Request $request)
    {
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar') && $request->avatar != '') {
            $name = $request->file('avatar')->getClientOriginalName();
            $image_path = $request->file('avatar')->store('image', 'public');
            $path = storage_path().'/app/public/'.$user->avatar;
            if(File::exists($path)) {
                File::delete($path);
            }
            $user->avatar = $image_path;
        }
      
        $user->save();
        
        return redirect('profile')->with('status', 'Profile updated!');
    }
}
