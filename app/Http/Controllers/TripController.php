<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
use App\Models\Bus;
use App\Models\BusImage;

class TripController extends Controller
{
    public function __construct()
    {
        $this->data['currentMenu'] = 'trip';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::all();

        $busImages = BusImage::pluck('path', 'bus_id')->toArray();

        // dd($busImages);

        foreach ($busImages as $key => $value) {
            // print($key);
            $tampungId[] = $key;
        }

        $trips = Trip::all();
        foreach($trips as $trip) {
            $this->data['trips'] = $trip;
            $this->data['trips']['bus_images'] = $busImages[$trip->bus_id];
        }

        $this->data['trips'] = $trips;

        // dd($this->data);

        return $this->load_theme('trips.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buses = Bus::all();

        $busImages = BusImage::pluck('path', 'bus_id')->toArray();

        foreach ($busImages as $key => $value) {
            // print($key);
            $tampungId[] = $key;
        }

        // $trips = Trip::all();
        // foreach($trips as $trip) {
        //     $this->data['trips'] = $trip;
        //     $this->data['trips']['bus_images'] = $busImages[$trip->bus_id];
        // }

        $trip = Trip::findOrFail($id);

        // dd($trip->to);

        $this->data['trip'] = $trip;
        // dd($this->data['trip']);

        $this->data['from'] = $trip->from;
        $this->data['to'] = $trip->to;
        // $this->data['trip']['bus_images'] = $busImages[$trip->bus_id];
        $this->data['bus_images'] = $busImages[$trip->bus_id];

        // dd($this->data['trip']['bus_images']);
        // dd($this->data);

        return $this->load_theme('trips.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
