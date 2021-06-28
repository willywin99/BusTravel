@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Trips</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Depart Date</th>
                                <th>Depart Time</th>
                                <th>Bus Id</th>
                                <th>Driver Id</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($trips as $trip)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $trip->from }}</td>
                                        <td>{{ $trip->to }}</td>
                                        <td>{{ $trip->depart_date }}</td>
                                        <td>{{ $trip->depart_time }}</td>
                                        <td>{{ $trip->bus_id }}</td>
                                        <td>{{ $trip->driver_id }}</td>
                                        <td>{{ $trip->qty }}</td>
                                        <td>{{ number_format($trip->price) }}</td>
                                        <td>
                                            <a href="{{ url('admin/trips/' . $trip->id . '/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                            {{-- @can('delete_trips') --}}
                                                {!! Form::open(['url' => 'admin/trips/' . $trip->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $trips->links() }}
                    </div>
                    {{-- @can('add_trips') --}}
                        <div class="card-footer text-right">
                            <a href="{{ url('admin/trips/create') }}" class="ladda-button btn btn-primary btn-square btn-ladda" data-style="zoom-in">Add New</a>
                        </div>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>
    </div>
@endsection
