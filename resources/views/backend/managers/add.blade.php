@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Manager</li>
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
                                <h3 class="card-title">Add Manager</h3>
                            </div>
                            <form class="form-horizontal" method="post" accept="{{ url('admin/manager/add') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Manager Name
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="manager_name" value="{{ old('manager_name') }}"
                                                class="form-control" required placeholder="Enter Manager Name">
                                                <span style="color: red;">{{ $errors->first('manager_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Manager Email
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" name="manager_email" value="{{ old('manager_email') }}"
                                                class="form-control" required placeholder="Enter Manager Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Manager Mobile
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" name="manager_mobile" value="{{ old('manager_mobile') }}"
                                                class="form-control" required placeholder="Enter Manager Mobile">
                                        </div>
                                    </div>
                                </div>
                                        <div class="card-footer">
                                            <a href="{{ url('admin/manager') }}" class="btn btn-warning">Back</a>
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
