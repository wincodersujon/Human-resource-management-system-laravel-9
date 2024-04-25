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
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
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
                                <h3 class="card-title">Add Departments</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/departments/add') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Department Name
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="department_name" value="{{ old('department_name') }}"
                                                class="form-control" required placeholder="Enter Department Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Manager Name(Manager ID)
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="manager_id" required>
                                                <option value="">Select Manager Name</option>
                                                <option value="1">Sujon</option>
                                                <option value="2">Prince</option>
                                                <option value="3">Hafis</option>
                                                <option value="4">Nafisa</option>
                                                {{-- @foreach ($getDepartments as $departments)
                                                <option value="{{ $departments->id }}">{{ $departments->department_name }}
                                                </option>
                                            @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Location Name(Location ID)
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="location_id" required>
                                                <option value="">Select Location Name</option>
                                                @foreach ($getLocations as $location)
                                                <option value="{{ $location->id }}">{{ $location->street_address }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('admin/departments') }}" class="btn btn-warning">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
