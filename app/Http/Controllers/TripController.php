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
        // $busImages = BusImage::all()->toArray();

        $buses = Bus::all();

        // dd($buses->busImages->path);

        $busImages = BusImage::pluck('path', 'bus_id')->toArray();

        // dd($busImages);

        foreach ($busImages as $key => $value) {
            // print($key);
            $tampungId[] = $key;
        }

        // $busImages = BusImage::pluck('path', 'bus_id');
        // $busImages = BusImage::all();
        // foreach($busImages as $busImage) {
        //     print($busImage->path);
        //     // print($busImage['path']);
        //     $this->data['image'] = $busImage['path'];
        //     // print_r($this->data['image']);
        // }

        // $trip = Trip::find(1);

        // foreach ($busImages as $busImage ) {
        //     $tampung = collect(['id' => $busImage->id]);
        //     print_r($tampung);
        // }
        // dd($tampung);

        $trips = Trip::all();
        foreach($trips as $trip) {
            // print_r($trip->bus_id);
            $this->data['trips'] = $trip;
            $this->data['trips']['bus_images'] = $busImages[$trip->id];
            // print_r($this->data);
        }

        $this->data['trips'] = $trips;
        // $this->data['busImages'] = $busImages[$trips->id];
        // $this->data['busImages'] = $busImages[$tampungId];

        // dd($this->data['trips']);

        // dd($trip->bus->name);
        // dd($trip);

        // dd($busImages);

        // $trips = Trip::pluck('bus_id')->flatten();

        // dd($trips->all());



        // foreach($trips as $trip) {
        //     $busId[] = $trip;
        // }

        // foreach ($busId as $value) {
        //     print($value);
        // }

        // dd($busId);

        // dd($this->data['images'] = $data);


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
        //
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
