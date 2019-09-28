<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'customField' => 'array',
    ];

    public function productVariation(){
        return $this->hasMany(ProductVariation::class);
    }
    public function review(){
        return $this->hasMany(ProductReview::class);
    }
    
}
