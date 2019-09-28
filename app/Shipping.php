<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    //
    use SoftDeletes;

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
