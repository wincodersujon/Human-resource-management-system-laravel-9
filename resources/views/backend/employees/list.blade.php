@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/employees/add') }}" class="btn btn-primary"> Add Employees</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        {{-- @include('message') --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Employees</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>ID</label>
                                            <input type="text" class="form-control" name="id" value="{{ Request()->id }}"
                                                placeholder="ID">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ Request()->name }}"
                                                placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ Request()->last_name }}"
                                                placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ Request()->email }}"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/employees') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @include('message')
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Employees List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                {{-- <th>Phone Number</th>
                                                <th>Hire Date</th>
                                                <th>Job ID</th>
                                                <th>Salary</th>
                                                <th>Commission PCT</th>
                                                <th>Manager ID</th>
                                                <th>Department ID</th> --}}
                                                <th>Is Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->last_name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    {{-- <td>{{ $value->phone_number}}</td>
                                                    <td>{{ $value->hire_date}}</td>
                                                    <td>{{ $value->job_id}}</td>
                                                    <td>{{ $value->salary}}</td>
                                                    <td>{{ $value->commission_pct}}</td>
                                                    <td>{{ $value->manager_id}}</td>
                                                    <td>{{ $value->department_id}}</td> --}}
                                                    <td>{{ !empty($value->is_role) ? 'HR' : 'Employees'}}</td>
                                                    <td>
                                                        <a href="{{ url('admin/employees/view/' .$value->id) }}"
                                                            class="btn btn-info">View</a>
                                                        <a href="{{ url('admin/employees/edit/'.$value->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="{{ url('admin/employees/delete/'.$value->id) }}"
                                                            class="btn btn-danger">Delete</a>
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
                        </div>
                </div>
          </section>
        </div>
      </div>
    </section>
    </div>
@endsection
