@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.buses.bus_menus')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Upload Images</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    {!! Form::open(['url' => ['admin/buses/images', $bus->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('image', 'Bus Image') !!}
                        {!! Form::file('image', ['class' => 'form-control-file', 'placeholder' => 'product image']) !!}
                    </div>
                    <div class="form-footer pt-5 border-top">
                        {{-- <button type="submit" class="btn btn-primary btn-default">Save</button> --}}
                        <button type="submit" class="ladda-button btn btn-primary btn-square btn-ladda" data-style="contract-overlay">
                            <span class="ladda-label">Save</span>
                            <span class="ladda-spinner"></span>
                            {{-- <div class="ladda-progress" style="width: 0px;"></div> --}}
                        </button>
                        <a href="{{ url('admin/buses/'.$busID.'/images') }}" class="ladda-button btn btn-secondary btn-square btn-ladda" data-style="contract">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
