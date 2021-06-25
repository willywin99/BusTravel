<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name',
        'id_card_number',
        'address',
        // 'picture'
    ];

    public function driverImages()
    {
        return $this->hasMany('App\Models\DriverImage');
    }
}
