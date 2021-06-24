<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusImage extends Model
{
    protected $fillable = [
        'bus_id',
        'path',
    ];

    public function bus()
    {
        return $this->belongsTo('App\Models\Bus');
    }
}
