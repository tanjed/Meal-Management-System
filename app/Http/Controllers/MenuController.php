<?php

namespace App\Http\Controllers;

use App\MealSystem;
use App\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu(){
       $user = User::find(auth()->user()->id);
       $mealSystems = $user->mealSystem;
        return view('menu',compact('mealSystems'));
    }
}
