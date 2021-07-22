<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('themes.travelagency.home');

        // $this->data['from'] = Trip::distinct()->get('from')->toArray();
        $from = DB::table('trips')->distinct()->pluck('from');
        $this->data['from'] = $from->toArray();
        // $this->data['to'] = Trip::distinct()->get('to')->toArray();
        $this->data['to'] = DB::table('trips')->distinct()->pluck('to')->toArray();

        // dd($this->data);

        return $this->load_theme('home', $this->data);
    }
}
