<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
    public function scopeGetCurrentMonth($query,$meal_system_id){
        return $query->where('meal_system',$meal_system_id)
            ->whereMonth('date',date('m'))
            ->whereYear('date',date('Y'));
    }
    public function user(){
       return $this->belongsTo(User::class);
    }

    public static function getCurrentMonthTotal($meal_system_id, $user_id = null)
    {
        $query = self::getcurrentmonth($meal_system_id);
        if ($user_id) $query = $query->where('user_id', $user_id);

        $total_cost = $query->sum('cost');
        return $total_cost ?: 0;
    }
}
