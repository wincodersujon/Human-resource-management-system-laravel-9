@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                         {{-- excel export --}}
                         <form action="{{ url('admin/managers_export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                            <a class="btn btn-success" href="{{ url('admin/managers_export?start_date='.Request::get('start_date').
                            '&end_date='.Request::get('end_date')) }}">Excel Export</a>
                        </form><br>

                        <a href="{{ url('admin/managers/add') }}" class="btn btn-primary"> Add Manager</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12">

                        {{-- Search box start --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Location</h3>
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
                                            <label>Manager Name</label>
                                            <input type="text" class="form-control" name="manager_name" value="{{ Request()->manager_name }}"
                                                placeholder="Manager Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>From Date(Start Date)</label>
                                            <input type="date" class="form-control" name="start_date" value="{{ Request()->start_date }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>To Date(End Date)</label>
                                            <input type="date" class="form-control" name="end_date" value="{{ Request()->end_date }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/managers') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Search box end --}}
                        @include('message')
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manager List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Manager Name</th>
                                            <th>Manager Email</th>
                                            <th>Manager Mobile</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->manager_name }}</td>
                                            <td>{{ $value->manager_email }}</td>
                                            <td>{{ $value->manager_mobile }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                                            </td>
                                            {{-- <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}
                                            </td> --}}
                                            <td>
                                                <a href="{{ url('admin/managers/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/managers/delete/' . $value->id) }}"
                                                    onclick="return confirm('Are you sure delete this manager?')"
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
    </div>
    </section>
    </div>
    </div>
    </section>
    </div>
@endsection
