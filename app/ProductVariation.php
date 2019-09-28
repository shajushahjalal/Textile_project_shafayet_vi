<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariation extends Model
{
    // Soft Delete
    use SoftDeletes;

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
