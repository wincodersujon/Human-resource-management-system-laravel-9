@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Countries</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Countries</li>
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
                                <h3 class="card-title">Edit Countries</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/countries/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Country Name
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="country_name" value="{{ $getRecord->country_name }}" class="form-control" required placeholder="Enter Region Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Region ID
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="regions_id" required>
                                                <option value="">Select Region Name</option>
                                                @foreach ($getRegion as $value)
                                                    <option value="{{ $value->id }}" {{ ($value->id == $getRecord->regions_id) ? 'selected' : '' }}>
                                                        {{ $value->region_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                <div class="card-footer">
                                    <a href="{{ url('admin/countries') }}" class="btn btn-warning">Back</a>
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
