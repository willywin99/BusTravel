<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
use App\Models\Bus;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // parent::__construct();
        $this->data['currentMenu'] = 'home';

        $this->data['q'] = null;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return view('themes.travelagency.home');

        $this->data['from'] = Trip::distinct()->get('from')->toArray();
        // $from = DB::table('trips')->distinct()->pluck('id', 'from');
        // $this->data['from'] = $from->toArray();
        $this->data['to'] = Trip::distinct()->get('to')->toArray();
        // $this->data['to'] = DB::table('trips')->distinct()->pluck('id', 'to')->toArray();

        // if ($q = $request->query('q')) {
        //     var_dump($q);exit;
        // }

        // dd($this->data);

        return $this->load_theme('home', $this->data);
    }

    public function search(Request $request)
    {
        $from = $request['from'];
        $to = $request['to'];
        $date = $request['date'];

        $this->data['from'] = $request['from'];
        $this->data['to'] = $request['to'];
        $this->data['date'] = $request['date'];
        dd($request);
    }
}
