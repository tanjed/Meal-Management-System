<?php

namespace App\Http\Controllers;

use App\Meal;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function processRegi(Request $request){
        $request = $this->validate($request,[
            'name' => 'required|max:10',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        try{
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),

            ]);
            auth()->login($user);
            return redirect()->to(url('/menu'));
        }
        catch (Exception $e){
            return back()->withErrors(['msg' => 'Something went Wrong!']);
        }

    }
}
