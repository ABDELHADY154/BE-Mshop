<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_number'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
