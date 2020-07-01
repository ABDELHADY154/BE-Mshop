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

        form {
            border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="card">

        <div class="register-box">
            <div class="register-logo">
                <a href="#"><b>{{config('app.name')}}</b></a>
            </div>
            <form method="POST" action="{{route('login-client')}}">
                @csrf
                <h1>Login</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="uname"><b>E-mail</b></label>
                <input type="text" placeholder="Enter email" name="email" required>
                {{-- @if ($errors->first('email'))
                <span class="text-danger">
                    {{ $errors->first('email') }}
                </span>
                @endif --}}
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                @if ($errors->first('email'))
                <div class="text-danger text-center">
                    {{ $errors->first('email') }}
                </div>
                @endif
                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </form>
            {{-- @yield('content') --}}
        </div>
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="/admin-style/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin-style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin-style/dist/js/adminlte.min.js"></script>
</body>

</html>
