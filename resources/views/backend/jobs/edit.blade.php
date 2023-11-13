@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jobs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
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
                                <h3 class="card-title">Edit Jobs</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/jobs/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job Title
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="job_title" value="{{ $getRecord->job_title }}" class="form-control" required placeholder="Enter Job Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Min Salary
                                            <span style="color:red;"></span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" name="min_salary" value="{{ $getRecord->min_salary }}" class="form-control" required placeholder="Enter Min Salary">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Max Salary
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" name="max_salary" value="{{ $getRecord->max_salary }}" class="form-control" required placeholder="Enter Max Salary">
                                        </div>
                                    </div>
                                <div class="card-footer">
                                    <a href="{{ url('admin/jobs') }}" class="btn btn-warning">Back</a>
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
