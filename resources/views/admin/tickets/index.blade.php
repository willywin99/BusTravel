@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Tickets</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>Passenger Name</th>
                                <th>Departure Time</th>
                                <th>Pick-up Address</th>
                                <th>Destination Address</th>
                                <th>Price</th>
                                <th>License Plate</th>
                                <th>Driver's Name</th>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $ticket->passenger_name }}</td>
                                        <td>{{ $ticket->departure_time }}</td>
                                        <td>{{ $ticket->pickup_address }}</td>
                                        <td>{{ $ticket->destination_address }}</td>
                                        <td>{{ $ticket->price }}</td>
                                        <td>{{ $ticket->bus_id }}</td>
                                        <td>{{ $ticket->driver_id }}</td>
                                        <td>
                                            <a href="{{ url('admin/tickets/'. $ticket->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>

                                            {!! Form::open(['url' => 'admin/tickets/'. $ticket->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tickets->links() }}
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ url('admin/tickets/create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
