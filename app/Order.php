<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'order_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')->withPivot('price', 'quantity', 'total');
    }
}
