@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Locations</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        {{-- excel export --}}
                        <form action="{{ url('admin/locations_export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                            <a class="btn btn-success" href="{{ url('admin/locations_export?start_date='.Request::get('start_date').
                            '&end_date='.Request::get('end_date')) }}">Excel Export</a>
                        </form><br>

                        <a href="{{ url('admin/locations/add') }}" class="btn btn-primary"> Add Location</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12">
                        {{-- Search --}}
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
                                            <label>Street Address</label>
                                            <input type="text" class="form-control" name="street_address" value="{{ Request()->street_address }}"
                                                placeholder="Street Address">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code" value="{{ Request()->postal_code }}"
                                                placeholder="Street Address">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" value="{{ Request()->city }}"
                                                placeholder="City">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>State Provice</label>
                                            <input type="text" class="form-control" name="state_provice" value="{{ Request()->state_provice }}"
                                                placeholder="State Provice">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Countries Name</label>
                                            <input type="text" class="form-control" name="country_name" value="{{ Request()->country_name }}"
                                                placeholder="Countries Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Created At</label>
                                            <input type="date" class="form-control" name="created_at" value="{{ Request()->created_at }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Updated At</label>
                                            <input type="date" class="form-control" name="updated_at" value="{{ Request()->updated_at }}">
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
                                            <a href="{{ url('admin/locations') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('message')
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Locations List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Street Address</th>
                                            <th>Postal Code</th>
                                            <th>City</th>
                                            <th>State Provice</th>
                                            <th>Countries Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @forelse ($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->street_address }}</td>
                                            <td>{{ $value->postal_code }}</td>
                                            <td>{{ $value->city }}</td>
                                            <td>{{ $value->state_provice }}</td>
                                            <td>{{ $value->country_name }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/locations/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/locations/delete/' . $value->id) }}"
                                                    onclick="return confirm('Are you sure delete this location?')"
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
