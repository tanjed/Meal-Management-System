<?php

namespace App\Http\Controllers;

use App\Bazar;
use App\Deposit;
use App\Meal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function showFirstPageDetails($meal_system_id){

        $user = auth()->user();
        //Find the Meals
        $meals = $user->meal->first();
        $meals = Meal::whereUserId($user->id)->where('date',Carbon::today())->first();

        //Find Given Amount
        $givenAmount = Deposit::getCurrentMonthDeposit($meal_system_id, $user->id);

        //Find user Total Bazar
        $usertotalExpense = Bazar::getCurrentMonthTotal($meal_system_id, $user->id);

       //Find Total Bazar
        $totalExpense = Bazar::getCurrentMonthTotal($meal_system_id);

        //Find person's Total Meal
        $totalMeal = $user->meal()->getcurrentmonth($meal_system_id)->sum('launch');
        $totalMeal +=  $user->meal()->getcurrentmonth($meal_system_id)->sum('dinner');
        if (empty($totalMeal)){
            $totalMeal = 0;
        }



        //Find Total Meal
        $mealscountofmonth = Meal::getcurrentmonth($meal_system_id)->sum('launch');
        $mealscountofmonth += Meal::getcurrentmonth($meal_system_id)->sum('dinner');
        if (empty($mealscountofmonth)){
            $mealscountofmonth = 0;
        }


        //Find Meal Rate
        $expensecountofmonth = Bazar::getcurrentmonth($meal_system_id)->sum('cost');
        if($mealscountofmonth > 0){
            $mealrate = $expensecountofmonth/$mealscountofmonth;
        }else{
            $mealrate = 0;
        }


        return view('index',compact('meal_system_id','meals','givenAmount','usertotalExpense','totalMeal','mealscountofmonth','mealrate','totalExpense'));


    }
}
