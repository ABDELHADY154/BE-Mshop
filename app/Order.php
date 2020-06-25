<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'client_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')->withPivot('price', 'quantity', 'total');
    }
    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
