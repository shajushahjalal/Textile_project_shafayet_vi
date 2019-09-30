<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    
    public function category(){
        return $this->belongsTo(Category::class,'id','categoryId');
    }

    public function product(){
        return $this->hasMany(Product::class,'id','subCategoryId');
    }
}
