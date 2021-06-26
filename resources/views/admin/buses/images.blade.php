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
                        <h2>Bus Images</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>Image</th>
                            <th>Uploaded At</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($busImages as $image)
                                <tr>
                                    <td>{{ $image->id }}</td>
                                    {{-- <td> {{ dd(asset('storage/'.$image)) }}</td> --}}
                                    <td><img src="{{ asset('storage/'.$image->path) }}" style="width:100px"/></td>
                                    <td>{{ $image->created_at }}</td>
                                    <td>
                                        {!! Form::open(['url' => 'admin/buses/images/'. $image->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('admin/buses/'.$busID.'/add-image') }}" class="ladda-button btn btn-primary btn-square btn-ladda" data-style="zoom-in">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
