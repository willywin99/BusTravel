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
        $this->data['tickets'] = Ticket::orderBy('name', 'ASC')->paginate(10);

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
        $buses = Bus::all('license_plate');
        // dd($buses);
        // var_dump($buses); exit;
        // $drivers = Driver::orderBy('name', 'ASC')->get();
        $drivers = Driver::all('id_card_number');

        $this->data['buses'] = $buses->toArray();
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
        $params = $request->except('_token');
        $params['user_id'] = Auth::user()->id;

        $saved = false;
        $saved = DB::transaction(function() use ($params) {
            $ticket = Ticket::create($params);
            // $ticket->bus()->sync($params[''])
        });
        var_dump($params); exit;
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
