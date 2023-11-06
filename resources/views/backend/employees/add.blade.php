@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Employees</li>
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
                                <h3 class="card-title">Add Employees</h3>
                            </div>
                            <form class="form-horizontal" method="post" accept="{{ url('admin/employees/add') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable">First Name
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable">Last Name
                                            <span style="color:red;"></span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable">Email ID
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required placeholder="Enter Email ID">
                                            <span style="color:red;">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable">Phone Number
                                            <span style="color:red;"></span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('phone_number') }}" name="phone_number" class="form-control"required placeholder="Enter Phone Number">
                                            <span style="color:red;">{{ $errors->first('phone_number') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable">Hire Date
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ old('hire_date') }}" name="hire_date" class="form-control" required placeholder="Enter Hire Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable"> Job Title
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                           <select class="form-control" value="{{ old('job_id') }}" name="job_id" required>
                                            <option value="">Select Job Title</option>
                                            <option value="1">Web Designer</option>
                                            <option value="2">Web Developer</option>
                                            <option value="3">MERN developer</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable"> Salary
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('salary') }}" name="salary" class="form-control" required placeholder="Enter Salary">
                                            <span style="color:red;">{{ $errors->first('salary') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable"> Commission PCT
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('commission_pct') }}" name="commission_pct" class="form-control" required placeholder="Enter Commission PCT">
                                            <span style="color:red;">{{ $errors->first('commission_pct') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable"> Manager Name
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                           <select class="form-control" name="manager_id" required>
                                            <option value="">Select Manager Name</option>
                                            <option value="1">XYZ</option>
                                            <option value="2">ABC</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable"> Departmet Name
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                           <select class="form-control" name="department_id" required>
                                            <option value="">Select Departmet Name</option>
                                            <option value="1">Designer Department</option>
                                            <option value="2">Developer Department</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-lable"> Is Role
                                            <span style="color:red;">*</span>
                                        </label>
                                        <div class="col-sm-10">
                                           <select class="form-control" name="is_role" required>
                                            <option value="">Select Role Type</option>
                                            <option value="0">User</option>
                                            <option value="1">Employees</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('admin/employees') }}" class="btn btn-warning">Back</a>
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
