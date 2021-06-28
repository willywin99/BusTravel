<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'from',
        'to',
        'depart_date',
        'depart_time',
        'bus_id',
        'driver_id',
        'qty',
        'price'
    ];

    public function bus()
    {
        return $this->hasMany('App/Models/Bus');
    }
}
