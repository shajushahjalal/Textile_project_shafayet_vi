<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    //
    use SoftDeletes;

    public function productVariation(){
        return $this->belongsTo(ProductVariation::class,'product_variation_id','id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
