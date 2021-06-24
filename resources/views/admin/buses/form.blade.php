@extends('admin.layout')

@section('content')

@php
    $formTitle = !empty($category) ? 'Update' : 'New'
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.buses.bus_menus')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Bus</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($bus))
                        {!! Form::model($bus, ['url' => ['admin/buses', $bus->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/buses']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Alphard']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('num_of_passenger', 'Number of Passengers') !!}
                            {!! Form::number('num_of_passenger', null, ['class' => 'form-control', 'placeholder' => '4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('license_plate', 'License Plate') !!}
                            {!! Form::text('license_plate', null, ['class' => 'form-control', 'placeholder' => 'B 1 RI']) !!}
                        </div>
                        {{-- <div class="form-group">
                            {!! Form::label('picture', 'Picture') !!}
                            {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => 'Insert Picture here!!']) !!}
                        </div> --}}

                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/buses') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
