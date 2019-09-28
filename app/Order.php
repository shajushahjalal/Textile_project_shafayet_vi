<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function createBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function shipping(){
        return $this->hasOne(Shipping::class,'order_id');
    }

    
}
