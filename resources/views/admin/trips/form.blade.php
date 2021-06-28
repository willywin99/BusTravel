@extends('admin.layout')

@section('content')

@php
    $formTitle = !empty($category) ? 'Update' : 'New'
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Trips</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($trip))
                        {!! Form::model($trip, ['url' => ['admin/trips', $trip->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/trips']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('from', "From") !!}
                            {!! Form::text('from', null, ['class' => 'form-control', 'placeholder' => "Pematangsiantar"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('to', "To") !!}
                            {!! Form::text('to', null, ['class' => 'form-control', 'placeholder' => "Medan"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('depart_date', 'Departure Date') !!}
                            {!! Form::date('depart_date', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('depart_time', 'Departure Time') !!}
                            {!! Form::time('depart_time', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('bus_license_plate', 'Bus License Plate') !!}
                            {{-- {!! Form::select('bus_license_plate', $buses, ['class' => 'form-control', 'selected' => !empty(old('bus_license_plate')) ? old('bus_license_plate') : $busIDs, 'placeholder' => "-- Choose License Plate --"]) !!} --}}
                            {!! Form::select('bus_id', $buses, null, ['class' => 'form-control', 'placeholder' => "-- Choose License Plate --"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('id_card_number', "Driver's ID Card Number") !!}
                            {{-- {!! Form::select('id_card_number', $drivers, ['class' => 'form-control', 'selected' => !empty(old('id_card_number')) ? old('id_card_number') : $driverIDs, 'placeholder' => "-- Choose Driver's ID Card Number --"]) !!} --}}
                            {!! Form::select('driver_id', $drivers, null, ['class' => 'form-control', 'placeholder' => "-- Choose Driver's ID Card Number --"]) !!}
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                {{-- <input name="price" type="text" class="form-control" aria-label="Amount (to the nearest Rupiah)" value="{{ $price }}"> --}}
                                {{-- {!! Form::text('price', null, ["class" => "form-control", 'placeholder' => 55000]) !!} --}}
                                {!! Form::number('price', null, ["class" => "form-control", "placeholder" => 55000]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="ladda-button btn btn-primary btn-square btn-ladda" data-style="contract-overlay">Save</button>
                            <a href="{{ url('admin/trips') }}" class="ladda-button btn btn-secondary btn-square btn-ladda" data-style="contract">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
