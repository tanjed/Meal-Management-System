<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\User;
Route::get('/',function (){
    return view('login');
})->name('login');
Route::get('/register/show',function (){
    return view('register');
});

Route::get('/menu','MenuController@getMenu');
Route::get ('/MealSystems/{id}', 'HomePageController@showFirstPageDetails');


Route::get('/savelaunchCount/{id}','MealCountController@saveLaunch');
Route::get('/savedinnerCount/{id}','MealCountController@saveDinner');



Route::get('/addBazar/{id}','BazarController@addBazar');


Route::get('/login','LoginController@processLogin');
Route::get('/register','RegisterController@processRegi');
Route::get('/logout','LoginController@logout');


