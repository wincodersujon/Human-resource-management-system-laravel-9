@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Countries</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                        <a href="{{ url('admin/countries/add') }}" class="btn btn-primary"> Add Countries</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Countries</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>ID</label>
                                            <input type="text" class="form-control" name="id" value="{{ Request()->id }}"
                                                placeholder="ID">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Country Name</label>
                                            <input type="text" class="form-control" name="country_name" value="{{ Request()->country_name }}"
                                                placeholder="Enter Country Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Region Name</label>
                                            <input type="text" class="form-control" name="region_name" value="{{ Request()->region_name }}"
                                                placeholder="Enter Region Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/countries') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Job Regions List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Country Name</th>
                                            <th>Region ID</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->country_name }}</td>
                                                <td>{{ !empty($value->get_region_name->region_name) ? $value->get_region_name->region_name : '' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/countries/edit/'.$value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/countries/delete/'.$value->id) }}"
                                                        onclick="return confirm('Are you sure delete this region?')" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="100%">No Record Found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div style="padding: 10px;float:right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
