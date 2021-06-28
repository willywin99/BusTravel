<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\TripRequest;

use App\Models\Trip;
use App\Models\Bus;
use App\Models\Driver;

use Auth;
use Session;
use DB;
use App\Authorizable;

class TripController extends Controller
{
    // use Authorizable;

    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'trips';
        $this->data['currentAdminSubMenu'] = 'trip';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['trips'] = Trip::latest()->paginate(10);

        return view('admin.trips.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::pluck('license_plate', 'id');
        $drivers = Driver::pluck('name', 'id');

        $this->data['buses'] = $buses->toArray();
        $this->data['drivers'] = $drivers->toArray();

        $this->data['busIDs'] = [];
        $this->data['driverIDs'] = [];

        $this->data['trip'] = null;

        return view('admin.trips.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripRequest $request)
    {
        $params = $request->except('_token');
        // $params['slug'] = Str::slug($params['name']);
        // $params['user_id'] = Auth::user()->id;

        $this->data['bus'] = Bus::pluck('license_plate', 'id')->toArray();

        $temp = $request['bus_id'];

        $bus = Bus::where('id', $temp)->first();

        // dd($bus->num_of_passenger);

        $params['qty'] = $bus->num_of_passenger;

        // dd(count($this->data['bus']));

        // dd($params);

        $saved = false;
        $saved = DB::transaction(function() use ($params) {
            $trip = Trip::create($params);

            return true;
        });

        if($saved) {
            Session::flash('success', 'Trip has been saved');
        } else {
            Session::flash('error', 'Trip could not be saved');
        }

        return redirect('admin/trips');
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
        $trip = Trip::findOrFail($id);

        $buses = Bus::pluck('license_plate', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();

        $this->data['trip'] = $trip;
        $this->data['buses'] = $buses;
        $this->data['drivers'] =$drivers;

        // dd($this->data);

        return view('admin.trips.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TripRequest $request, $id)
    {
        $params = $request->except('_token');

        $trip = Trip::findOrFail($id);

        // dd($params);

        $saved = false;
        $saved = DB::transaction(function() use ($trip, $params) {
            $trip->update($params);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Trip has been updated');
        } else {
            Session::error('error', 'Trip could not be updated');
        }

        return redirect('admin/trips');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);

        if ($trip->delete()) {
            Session::flash('success', 'Trip has been deleted');
        }

        return redirect('admin/trips');
    }
}
