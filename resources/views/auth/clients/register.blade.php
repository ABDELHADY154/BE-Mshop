<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{config('app.name')}} |Clients Registration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-style/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/admin-style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin-style/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .invalid-feedback {
            display: block;
        }

        @import "bourbon";

        body {
            background: #eee !important;
        }

        .wrapper {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .form-signin {
            max-width: 380px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);

            .form-signin-heading,
            .checkbox {
                margin-bottom: 30px;
            }

            .checkbox {
                font-weight: normal;
            }

            .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;

            }



            input[type="text"] {
                margin-bottom: -1px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            input[type="password"] {
                margin-bottom: 20px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="register-logo">
            <a href="#"><b>{{config('app.name')}}</b></a>
        </div>

        <form method="POST" action="{{route('register-client')}}" class="form-signin">
            @csrf
            <h2 class="form-signin-heading">Please Register</h2>
            <label for="name"><b>Full Name</b></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="" autofocus="" />
            @if ($errors->first('name'))
            <span class="text-danger">
                {{ $errors->first('name') }}
            </span>
            @endif
            <label for="email"><b>E-mail</b></label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required=""
                autofocus="" />
            @if ($errors->first('email'))
            <span class="text-danger">
                {{ $errors->first('email') }}
            </span>
            @endif
            <label for="phone_number"><b>Phone Number</b></label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="phone number"
                required="" autofocus="" />
            @if ($errors->first('phone_number'))
            <span class="text-danger">
                {{ $errors->first('phone_number') }}
            </span>
            @endif
            <label for="password"><b>Password</b></label>

            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                required="" />
            <label for="Retype_Password"><b>Retype Password</b></label>

            <input type="password" class="form-control" id="Retype_Password" name="password_confirmation"
                placeholder="Retype Password" required="" />
            @if ($errors->first('password'))
            <span class="text-danger">
                {{ $errors->first('password') }}
            </span>
            @endif
            <label class="checkbox">
                <input type="checkbox" value="Agree" id="rememberMe" name="rememberMe">Terms and conditions
            </label>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <div class="text-center">or
                <hr>
            </div>
            <a class="btn btn-lg btn-success btn-block" href="{{route('login-client')}}">Login</a>
        </form>
    </div>


    <!-- jQuery -->
    <script src="/admin-style/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin-style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin-style/dist/js/adminlte.min.js"></script>
</body>

</html>
