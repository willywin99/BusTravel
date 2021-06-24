<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'name',
        'num_of_passenger',
        'license_plate',
        'picture',
    ];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }

    public function busImages()
    {
        return $this->hasMany('App\Models\BusImage');
    }
}
