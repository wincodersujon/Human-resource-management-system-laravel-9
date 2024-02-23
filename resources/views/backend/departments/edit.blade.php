@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Departments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Departments</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/departments/edit/'.$getRecord->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Department Name
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="department_name"
                                                value="{{ $getRecord->department_name }}" class="form-control" required
                                                placeholder="Enter Department Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Manager Name(Manager ID)
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="manager_id" required>
                                                <option {{ ($getRecord->manager_id ==1) ? 'selected' : '' }} value="1">Sujon</option>
                                                <option {{ ($getRecord->manager_id ==2) ? 'selected' : '' }} value="2">Biswas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Location Name(Location ID)
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="location_id" required>
                                                @foreach ($getLocations as $location)
                                                    <option {{ ($location->id == $getRecord->location_id) ? 'selected' : ''}} value="{{ $location->id }}">
                                                            {{ $location->street_address }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('admin/departments') }}" class="btn btn-warning">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
