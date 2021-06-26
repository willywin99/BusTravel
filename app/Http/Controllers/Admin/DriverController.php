<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\DriverRequest;

use App\Models\Driver;
use App\Models\DriverImage;
use App\Http\Requests\DriverImageRequest;

use Str;
use Auth;
use DB;
use Session;

class DriverController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'driver';
        $this->data['currentAdminSubMenu'] = 'drivers';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['drivers'] = Driver::orderBy('name', 'ASC')->paginate(10);

        return view('admin.drivers.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver_images = DriverImage::orderBy('id', 'ASC')->get();

        $this->data['driver_images'] = $driver_images->toArray();
        // dd($this->data['driver_images']);

        $this->data['driver'] = null;
        $this->data['driverID'] = 0;

        return view('admin.drivers.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
        $params = $request->except('_token');

        // dd($params);

        $params['slug'] = Str::slug($params['name']);
        $params['user_id'] = Auth::user()->id;

        $saved = false;
        $saved = DB::transaction(function() use ($params) {
            $driver = Driver::create($params);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Driver has been saved');
        } else {
            Session::flash('error', 'Driver could not be saved');
        }

        return redirect('admin/drivers');
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
        if (empty($id)) {
            return redirect('admin/drivers/create');
        }

        $driver = Driver::findOrFail($id);

        $this->data['driver'] = $driver;
        $this->data['driverID'] = $driver->id;

        return view('admin.drivers.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);

        $driver = Driver::findOrFail($id);

        $saved = false;
        $saved = DB::transaction(function() use ($driver, $params) {
            $driver->update($params);

            return true;
        });

        if ($saved) {
            Session::flash('success', 'Driver has been updated');
        } else {
            Session::flash('error', 'Driver could not be updated');
        }

        return redirect('admin/drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);

        if ($driver->delete()) {
            Session::flash('success', 'Driver has been deleted');
        }

        return redirect('admin/drivers');
    }

    public function images($id)
    {
        if (empty($id)) {
            return redirect('admin/drivers/create');
        }

        $driver = Driver::findOrFail($id);

        $this->data['driverID'] = $driver->id;
        $this->data['driverImages'] = $driver->driverImages;

        // dd($this->data['driverImages']);

        return view('admin.drivers.images', $this->data);
    }

    public function add_image($id)
    {
        if (empty($id)) {
            return redirect('admin/drivers');
        }

        $driver = Driver::findOrFail($id);

        $this->data['driverID'] = $id;
        $this->data['driver'] = $driver;

        return view('admin.drivers.image_form', $this->data);
    }

    public function upload_image(DriverImageRequest $request, $id)
    {
        $driver = Driver::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $driver->name . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'driver_id' => $driver->id,
                'path' => $filePath,
            ];

            if (DriverImage::create($params)) {
                Session::flash('success', 'Image has been uploaded');
            } else {
                Session::flash('errror', 'Image could not be uploaded');
            }

            return redirect('admin/drivers/' . $id . '/images');
        }
    }

    public function remove_image($id)
    {
        $image = DriverImage::findOrFail($id);

        // dd($image);

        if ($image->delete()) {
            Session::flash('success', 'Image has been deleted');
        }


        return redirect('admin/drivers/' . $image->driver->id . '/images');
    }
}
