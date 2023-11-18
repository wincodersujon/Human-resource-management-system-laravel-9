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

                        @include('message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Job Grades List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>

                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div style="padding: 10px;float:right;">
                                    {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
