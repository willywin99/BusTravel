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
                        <h2>{{ $formTitle }} Ticket</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($ticket))
                        {!! Form::model($ticket, ['url' => ['admin/tickets', $ticket->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/tickets']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('passenger_name', "Passenger's Name") !!}
                            {!! Form::text('passenger_name', null, ['class' => 'form-control', 'placeholder' => "Willy Sianturi"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('departure_time', "Departure Time") !!}
                            {{-- {!! Form::datetime('departure_time', null, ['class' => 'form-control datetimepicker']) !!} --}}
                            {{-- {!! Form::date('name', \Carbon\Carbon::now()); !!} --}}
                            {{-- {{ Form::input('dateTime-local', 'departure_time', \Carbon\Carbon::now(), ['class' => 'form-control datetimepicker', 'id' => 'datetimepicker']) }} --}}
                            {{-- {!! Form::datetimeLocal('departure_time', date('Y-m-d\TH:i:sP', null) , ['class' => 'form-control']) !!} --}}
                            {!! Form::datetimeLocal('departure_time', null, ['class' => 'form-control']) !!}
                            {{-- {{ Form::input('dateTime-local', 'departure_time', 2021-05-18, ['class' => 'form-control datetimepicker', 'id' => 'datetimepicker', 'value' => '2021-05-18T16:40']) }} --}}
                            {{-- {!! Form::datetime('departure_time', \Carbon\Carbon::now()) !!} --}}
                            {{-- {{ Form::input('dateTime-local', 'departure_time', date('Y-m-d H:i:s'), ['class' => 'form-control datetimepicker']) }} --}}
                            {{-- {!! Form::text('departure_time', null, ['class' => 'form-control datetimepicker']) !!} --}}
                        </div>

                        {{-- <div class="form-group">
                            <label class="label-control">Datetime Picker</label>
                            <input type="text" class="form-control datetimepicker" value="10/05/2016">
                        </div> --}}

                        {{-- <label class="text-dark font-weight-medium" for="">Date input</label> --}}

                        {{-- <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="mdi mdi-calendar-range"></i>
                                </span>
                            </div>

                            <input type="text" class="form-control" data-mask="00/00/0000" placeholder="" aria-label="">
                        </div>

                        <p style="font-size: 90%">ex. 99/99/9999</p> --}}

                        <div class="form-group">
                            {!! Form::label('pickup_address', 'Pick-up Address') !!}
                            {!! Form::text('pickup_address', null, ['class' => 'form-control', 'placeholder' => 'Jalan Merbabu No.32 aa-bb, Pusat Ps., Kec. Medan Kota, Kota Medan, Sumatera Utara 20212']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('destination_address', 'Destination Address') !!}
                            {!! Form::text('destination_address', null, ['class' => 'form-control', 'placeholder' => 'Jalan Merbabu No.32 aa-bb, Pusat Ps., Kec. Medan Kota, Kota Medan, Sumatera Utara 20212']) !!}
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

                        {{-- <div class="form-group">
                            {!! Form::label('category_ids', 'Category') !!}
                            {!! General::selectMultiLevel('category_ids[]', $categories, ['class' => 'form-control', 'multiple' => true, 'selected' => !empty(old('category_ids')) ? old('category_ids') : $categoryIDs, 'placeholder' => '-- Choose Category --']) !!}
                        </div> --}}
                        {{-- <div class="form-group">
                            {!! Form::label('short_description', 'Short Description') !!}
                            {!! Form::textarea('short_description', null, ['class' => 'form-control', 'placeholder' => 'short description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('weight', 'Weight') !!}
                            {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'weight']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('length', 'Length') !!}
                            {!! Form::text('length', null, ['class' => 'form-control', 'placeholder' => 'length']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('width', 'Width') !!}
                            {!! Form::text('width', null, ['class' => 'form-control', 'placeholder' => 'width']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('height', 'Height') !!}
                            {!! Form::text('height', null, ['class' => 'form-control', 'placeholder' => 'height']) !!}
                        </div> --}}
                        {{-- <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', $statuses , null, ['class' => 'form-control', 'placeholder' => '-- Set Status --']) !!}
                        </div> --}}
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="ladda-button btn btn-primary btn-square btn-ladda" data-style="contract-overlay">Save</button>
                            <a href="{{ url('admin/tickets') }}" class="ladda-button btn btn-secondary btn-square btn-ladda" data-style="contract">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <script>
    $(document).ready(function() {
    $('body').bootstrapMaterialDesign();

      $('.datetimepicker').datetimepicker({
           icons: {
               time: "fa fa-clock-o",
               date: "fa fa-calendar",
               up: "fa fa-chevron-up",
               down: "fa fa-chevron-down",
               previous: 'fa fa-chevron-left',
               next: 'fa fa-chevron-right',
               today: 'fa fa-screenshot',
               clear: 'fa fa-trash',
               close: 'fa fa-remove'
           }
        });

        $('.datepicker').datetimepicker({
           format: 'MM/DD/YYYY',
           icons: {
               time: "fa fa-clock-o",
               date: "fa fa-calendar",
               up: "fa fa-chevron-up",
               down: "fa fa-chevron-down",
               previous: 'fa fa-chevron-left',
               next: 'fa fa-chevron-right',
               today: 'fa fa-screenshot',
               clear: 'fa fa-trash',
               close: 'fa fa-remove'
           }
        });

        $('.timepicker').datetimepicker({
//          format: 'H:mm',    // use this format if you want the 24hours timepicker
           format: 'h:mm A',    //use this format if you want the 12hours timpiecker with AM/PM toggle
           icons: {
               time: "fa fa-clock-o",
               date: "fa fa-calendar",
               up: "fa fa-chevron-up",
               down: "fa fa-chevron-down",
               previous: 'fa fa-chevron-left',
               next: 'fa fa-chevron-right',
               today: 'fa fa-screenshot',
               clear: 'fa fa-trash',
               close: 'fa fa-remove'

           }
        });
});
</script> --}}

{{-- <script>
    $(function () {
        $('.datetimepicker').datetimepicker();
    });
</script> --}}

{{-- <script type="text/javascript">
    $.(document).ready(function() {
        $('.datetimepicker').datetimepicker({
            console.log(departure_time);
        });
    });
</script> --}}

<script>
    // document.getElementsByClassName('datetimepicker').value = new Date().toDateInputValue();

</script>
