@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jobs Grades</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                        <a href="{{ url('admin/job_grades/add') }}" class="btn btn-primary"> Add Job Grades</a>
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
                                <h3 class="card-title">Search Job Grades</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-1">
                                            <label>ID</label>
                                            <input type="text" class="form-control" name="id" value="{{ Request()->id }}"
                                                placeholder="ID">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Grade Level</label>
                                            <input type="text" class="form-control" name="grade_level" value="{{ Request()->grade_level }}"
                                                placeholder="Grade Level">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Lowest Salary</label>
                                            <input type="number" class="form-control" name="lowest_salary" value="{{ Request()->lowest_salary }}"
                                                placeholder="Lowest Salary">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Highest Salary</label>
                                            <input type="number" class="form-control" name="highest_salary" value="{{ Request()->highest_salary }}"
                                                placeholder="Highest Salary">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Created At</label>
                                            <input type="date" class="form-control" name="created_at" value="{{ Request()->created_at }}"
                                                placeholder="Created At">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Updated At</label>
                                            <input type="date" class="form-control" name="updated_at" value="{{ Request()->updated_at }}"
                                                placeholder="Created At">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/job_grades') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Job Grades List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Grade Level</th>
                                            <th>Lowest Salary</th>
                                            <th>Highest Salary</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->grade_level }}</td>
                                                <td>{{ $value->lowest_salary }}</td>
                                                <td>{{ $value->highest_salary }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                                                <td>
                                                    {{-- <a href="{{ url('admin/job_grades/view/' .$value->id) }}"
                                                        class="btn btn-info">View</a> --}}
                                                    <a href="{{ url('admin/job_grades/edit/'.$value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/job_grades/delete/'.$value->id) }}"
                                                        onclick="return confirm('Are you sure delete this job grade?')" class="btn btn-danger">Delete</a>
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
