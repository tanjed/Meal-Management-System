<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function scopeGetCurrentMonth($query,$meal_system_id){
        return $query->where('meal_system',$meal_system_id)
            ->whereMonth('date',date('m'))
            ->whereYear('date',date('Y'));
    }
    public function user(){
       return $this->belongsTo(User::class);
    }

    public function scopeWhereUserId($query, $user_id){
        return $query->where('user_id', $user_id);
    }
}
