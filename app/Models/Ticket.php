<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'passenger_name',
        'departure_time',
        'pickup_address',
        'destination_address',
        'price',
        'user_id',
        'bus_id',
        'driver_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function bus()
    {
        return $this->belongsTo('App\Models\Bus');
    }

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
}
