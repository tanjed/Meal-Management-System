<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealSystem extends Model
{
    public function user(){
        return $this->belongsToMany(User::Class,'mealsystem_users');
    }
}
