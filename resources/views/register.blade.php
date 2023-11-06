<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('../plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('../dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register in to start your session</p>
                @include('message')
                <form action="{{ url('register_post') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" required placeholder="Name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color: red;">{{ $errors->first('name') }}</span>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" required placeholder="Email" value="{{ old('email') }}"
                        onblur="duplicateEmail(this)">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color: red;" class="duplicate_message">{{ $errors->first('email') }}</span>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color: red;">{{ $errors->first('password') }}</span>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirm_password" required placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color: red;">{{ $errors->first('confirm_password') }}</span>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{ url('forgot-password') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ url('/') }}" class="text-center">Sign In</a>
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script type="{{ url('../plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script type="{{ url('../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- AdminLTE App -->
    <script type="{{url ('../dist/js/adminlte.min.js') }}"></script>

    <script type="text/javascript">
     function duplicateEmail(element){
        var email = $(element).val();

     $.ajax({
        type: "POST",
        url: '{{ url('checkemail') }}',
        data:{
            email: email,
            _token: "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(res){
            if(res.exists){
                $('.duplicate_message').html("That email already exists Try another")
            }else{
                $('.duplicate_message').html("")
            }
        },
        error:function(jqXHR, exception) {
        }
     });
    }
    </script>
</body>

</html>

