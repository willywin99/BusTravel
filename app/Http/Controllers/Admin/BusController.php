<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\BusRequest;
use App\Http\Requests\BusImageRequest;

use App\Models\Bus;
use App\Models\BusImage;
use App\Models\Trip;

use Str;
use Auth;
use DB;
use Session;
use App\Authorizable;

class BusController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'bus';
        $this->data['currentAdminSubMenu'] = 'all_bus';
    }

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
        $bus_images = BusImage::orderBy('id', 'ASC')->get();

        $this->data['bus_images'] = $bus_images->toArray();
        // dd($this->data['bus_images']);

        $this->data['bus'] = null;
        $this->data['busID'] = 0;

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
        $params['slug'] = Str::slug($params['name']);
        $params['user_id'] = Auth::user()->id;

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
        $bus_images = BusImage::orderBy('id', 'ASC')->get();
        // $bus_images = Bus::busImages('id', 'ASC')->get();

        // dd($bus_images);

        $this->data['bus_images'] = $bus_images->toArray();

        // dd($bus_images);

        if (empty($id)) {
            return redirect('admin/buses/create');
        }

        $bus = Bus::findOrFail($id);

        $this->data['bus'] = $bus;
        $this->data['busID'] = $bus->id;

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
        $params['slug'] = Str::slug($params['name']);

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

    public function images($id)
    {
        if (empty($id)) {
            return redirect('admin/buses/create');
        }

        $bus = Bus::findOrFail($id);

        $this->data['busID'] = $bus->id;
        $this->data['busImages'] = $bus->busImages;

        // dd($this->data['busImages']);

        return view('admin.buses.images', $this->data);
    }

    public function add_image($id)
    {
        if (empty($id)) {
            return redirect('admin/buses');
        }

        $bus = Bus::findOrFail($id);

        $this->data['busID'] = $id;
        $this->data['bus'] = $bus;

        return view('admin.buses.image_form', $this->data);
    }

    public function upload_image(BusImageRequest $request, $id)
    {
        $bus = Bus::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $bus->name . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'bus_id' => $bus->id,
                'path' => $filePath,
            ];

            if (BusImage::create($params)) {
                Session::flash('success', 'Image has been uploaded');
            } else {
                Session::flash('errror', 'Image could not be uploaded');
            }

            return redirect('admin/buses/' . $id . '/images');
        }
    }

    public function remove_image($id)
    {
        $image = BusImage::findOrFail($id);

        // dd($image);

        if ($image->delete()) {
            Session::flash('success', 'Image has been deleted');
        }


        return redirect('admin/buses/' . $image->bus->id . '/images');
    }
}
