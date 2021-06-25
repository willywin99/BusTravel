<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\TicketRequest;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\User;

use Str;
use Auth;
use DB;
use Session;

class TicketController extends Controller
{
    // public function __construct()
    // {
    //     $this->data['buses'] = Ticket::bus();
    //     $this->data['drivers'] = Ticket::driver();
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['tickets'] = Ticket::orderBy('passenger_name', 'ASC')->paginate(10);

        return view('admin.tickets.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $buses = Bus::orderBy('name', 'ASC')->get();
        // $buses = Bus::all('license_plate');
        $buses = Bus::pluck('license_plate', 'id');
        // dd($buses);
        // dd($buses[0]['license_plate']);
        // var_dump($buses); exit;
        // $drivers = Driver::orderBy('name', 'ASC')->get();
        // $drivers = Driver::all('id_card_number');
        $drivers = Driver::pluck('name', 'id');

        $this->data['buses'] = $buses->toArray();
        // dd($buses->toArray());
        $this->data['drivers'] = $drivers->toArray();

        $this->data['busIDs'] = [];
        $this->data['driverIDs'] = [];

        $this->data['ticket'] = null;

        // var_dump($this->data['buses'][0]['license_plate']); exit;

        return view('admin.tickets.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        // dd($request);
        // $bus = Bus::where('license_plate', $request->license_plate);

        // dd($bus);

        $drivers = Driver::all('id_card_number');

        $params = $request->except('_token');
        $params['user_id'] = Auth::user()->id;
        // $params['bus_id'] = $buses->bus_id;
        // $params['driver_id'] = $drivers->driver_id;

        // dd($params);

        $saved = false;
        $saved = DB::transaction(function() use ($params) {
            $ticket = Ticket::create($params);
            // $ticket->bus()->sync($params['busIDs']);

            // dd($ticket);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Ticket has been saved');
        } else {
            Session:flash('error', 'Ticket could not been saved');
        }
        // var_dump($params); exit;

        return redirect('admin/tickets');
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
        $ticket = Ticket::findOrFail($id);

        $buses = Bus::pluck('license_plate', 'id')->toArray();
        $drivers = Driver::pluck('name', 'id')->toArray();

        $this->data['ticket'] = $ticket;
        $this->data['buses'] = $buses;
        $this->data['drivers'] =$drivers;

        // dd($this->data);

        return view('admin.tickets.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, $id)
    {
        $params = $request->except('_token');

        $ticket = Ticket::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function() use ($ticket, $params) {
            $ticket->update($params);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Ticket has been updated');
        } else {
            Session::error('error', 'Ticket could not be updated');
        }

        return redirect('admin/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket->delete()) {
            Session::flash('success', 'Ticket has been deleted');
        }

        return redirect('admin/tickets');
    }
}
