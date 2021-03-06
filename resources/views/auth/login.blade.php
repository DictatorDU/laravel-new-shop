<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/') }}admin/login/asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/') }}admin/login/asset/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/') }}admin/login/asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('/') }}admin/login/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                               @if ($errors->has('email'))
                                   <span class="invalid-feedback error" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                                @endif
                                    <input placeholder="E-mail" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus>
                                </div>
                                <div class="form-group">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    <input placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                 <button type="submit" class="btn btn-lg btn-success btn-block">
                                    {{ __('Login') }}
                                </button>
                                <center class='mt-5'><a class='signup' href="{{ route('register') }}">Register</a>
                                </center>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('/') }}admin/login/asset/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/') }}admin/login/asset/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/') }}admin/login/asset/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/') }}admin/login/asset/dist/js/sb-admin-2.js"></script>

</body>

</html>
