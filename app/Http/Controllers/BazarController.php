<?php

namespace App\Http\Controllers;

use App\Bazar;
use App\Deposit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BazarController extends Controller
{
    public function addBazar(Request $request,$meal_system_id){
        $bazar =  new Bazar();
        $bazar->user_id = auth()->user()->id;
        $bazar->cost = $request->cost;
        $bazar->detail = $request->detail;
        $bazar->date = Carbon::today();
        $bazar->meal_system =$meal_system_id;
        $bazar->save();
        $deposit = new Deposit();
        $deposit->user_id = auth()->user()->id;
        $deposit->amount = $request->cost;
        $deposit->date = Carbon::today();
        $deposit->meal_system = $meal_system_id;
        $deposit->save();
        $meal_system =1;
        return redirect(url('/MealSystems/'. $meal_system));
    }
}
