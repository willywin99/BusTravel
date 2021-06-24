<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverImage extends Model
{
    protected $fillable = [
        'driver_id',
        'path',
    ];

    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
}
