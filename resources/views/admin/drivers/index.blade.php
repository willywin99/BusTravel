@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Drivers</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>ID Card Number</th>
                                <th>Address</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($drivers as $driver)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $driver->name }}</td>
                                        <td>{{ $driver->id_card_number }}</td>
                                        <td>{{ $driver->address }}</td>
                                        <td>
                                            <a href="{{ url('admin/drivers/'. $driver->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>

                                            {!! Form::open(['url' => 'admin/drivers/'. $driver->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        {{ $drivers->links() }}
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ url('admin/drivers/create') }}" class="ladda-button btn btn-primary btn-square btn-ladda" data-style="zoom-in">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
