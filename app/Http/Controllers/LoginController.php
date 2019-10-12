<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function processLogin(Request $request){
        $validation = $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $remember_me = $request->has('remember') ? true : false;
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)){
            return redirect()->intended(url('/menu'));

        }
        return back()->withErrors(["msg" => "Invalid Email or Password"])->withInput($request->only('email'));
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
