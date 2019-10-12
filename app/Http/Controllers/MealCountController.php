<?php

namespace App\Http\Controllers;


use App\Meal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MealCountController extends Controller
{

    public function saveLaunch(Request $request, $meal_systen_id){
        $user_id = auth()->user()->id;
         $data = Meal::where('user_id', $user_id)->where('meal_system',$meal_systen_id)->where('date',Carbon::today())->first();
         if(empty($data)){
             $data = new Meal();
         }
        $data->user_id = auth()->user()->id;
        $data->launch = $request->mealCount;
        $data->date = Carbon::today();
        $data->save();
        return $data;

    }
    public function saveDinner(Request $request,$meal_systen_id){
//
        $user_id = auth()->user()->id;
        $data = Meal::where('user_id', $user_id)->where('meal_system',$meal_systen_id)->where('date',Carbon::today())->first();
        if(empty($data)){
            $data = new Meal();
        }
        $data->user_id = auth()->user()->id;
        $data->dinner = $request->mealCount;
        $data->date = Carbon::now();
        $data->save();
        return $data;

    }
}
