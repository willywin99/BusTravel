@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Categories</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Number of Passengers</th>
                                <th>License Plate</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($buses as $bus)
                                    <tr>
                                        <td>{{ $bus->index }}</td>
                                        <td>{{ $bus->name }}</td>
                                        <td>{{ $bus->num_of_passenger }}</td>
                                        <td>{{ $bus->license_plate }}</td>
                                        <td>{{ $bus->picture }}</td>
                                        <td>
                                            <a href="{{ url('admin/buses/' . $bus->id . '/edit') }}" class="btn btn-warning btn-sm">edit</a>

                                            {!! Form::open(['url' => 'admin/buses/' . $bus->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $buses->links() }}
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ url('admin/buses/create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
