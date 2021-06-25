@extends('admin.layout')

@section('content')

@php
    $formTitle = empty($driver_images) ? 'Update' : 'New'
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.drivers.driver_menus')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Driver</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($driver))
                        {!! Form::model($driver, ['url' => ['admin/drivers', $driver->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/drivers']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Willy Sianturi']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('id_card_number', 'ID Card Number') !!}
                            {!! Form::number('id_card_number', null, ['class' => 'form-control', 'placeholder' => '1272052003990003']) !!}
                        </div>
                        {{-- <div class="form-group">
                            {!! Form::label('num_of_passenger', 'Number of Passengers') !!}
                            {!! Form::number('num_of_passenger', null, ['class' => 'form-control', 'placeholder' => '4']) !!}
                        </div> --}}
                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Jln. Melanthon Siregar Gg. Cantik Manis']) !!}
                        </div>
                        {{-- <div class="form-group">
                            {!! Form::label('picture', 'Picture') !!}
                            {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => 'Insert Picture here!!']) !!}
                        </div> --}}

                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/drivers') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
