<?php

namespace App;

use Illuminate\Foundation\Auth\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Client extends User
{
    protected $fillable = [
        'name', 'email', 'phone_number', 'password'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function setPasswordAttribute($plainPassword)
    {
        $this->attributes['password'] = Hash::make($plainPassword);
    }
    // public function toArray()
    // {
    // }
    // public function toArrayShow()
    // {
    // }
}
