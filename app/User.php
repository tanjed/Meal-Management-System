<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    public function bazar(){
        return $this->hasMany(Bazar::class);
    }
    public function  deposit(){
       return $this->hasMany(Deposit::class);
    }
    public function meal(){
       return $this->hasMany(Meal::class);
    }
    public function mealSystem(){
        return $this->belongsToMany(MealSystem::Class,'mealsystem_users');
    }
}
