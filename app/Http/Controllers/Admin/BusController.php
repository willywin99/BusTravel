<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\BusRequest;

use App\Models\Bus;

use DB;
use Session;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['buses'] = Bus::orderBy('name', 'ASC')->paginate(10);

        return view('admin.buses.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $buses = Bus::orderBy('name', 'ASC')->get();
        $this->data['bus'] = null;

        return view('admin.buses.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRequest $request)
    {
        $params = $request->except('_token');

        // dd($params);

        $saved = false;
        $saved = DB::transaction(function() use ($params) {
            $bus = Bus::create($params);

            return true;
        });

        if($saved) {
            Session::flash('success', 'Bus has been saved');
        } else {
            Session::flash('error', 'Bus could not be saved');
        }

        return redirect('admin/buses');
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
        $bus = Bus::findOrFail($id);

        $this->data['bus'] = $bus;

        return view('admin.buses.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusRequest $request, $id)
    {
        $params = $request->except('_token');

        $bus = Bus::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function() use ($bus, $params) {
            $bus->update($params);

            return true;
        });

        if($saved) {
            Session::flash('success', 'Bus has been updated');
        } else {
            Session::flash('error', 'Bus could not be updated');
        }

        return redirect('admin/buses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);

        if ($bus->delete()) {
            Session::flash('success', 'Bus has been deleted');
        }

        return redirect('admin/buses');
    }
}
