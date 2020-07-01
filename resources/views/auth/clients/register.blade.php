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

        /* * {
            box-sizing: border-box
        } */

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        .card {
            width: 100% !important;
        }
    </style>
</head>

<body class="hold-transition register-page">
    @if ($errors->first('email'))
    <span class="text-danger">
        {{ $errors->first('email') }}
    </span>
    @endif
    <div class="row">

        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="register-logo">
                        <a href="#"><b>{{config('app.name')}}</b></a>
                    </div>
                    <form method="POST" action="{{route('register-client')}}">
                        @csrf
                        {{-- <div class="container"> --}}
                        <h1>Register</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <label for="name"><b>Full Name</b></label>
                        <input type="text" placeholder="Enter Your Name" name="name" id="name" required>
                        @if ($errors->first('name'))
                        <span class="text-danger">
                            {{ $errors->first('name') }}
                        </span>
                        @endif

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>
                        @if ($errors->first('email'))
                        <span class="text-danger">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                        <label for="phone_number"><b>Phone number</b></label>
                        <input type="text" placeholder="Enter phone_number" name="phone_number" id="phone_number"
                            required>
                        @if ($errors->first('phone_number'))
                        <span class="text-danger">
                            {{ $errors->first('phone_number') }}
                        </span>
                        @endif
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="psw" required>

                        <label for="password"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="password" id="password" required>
                        <hr>
                        @if ($errors->first('password'))
                        <span class="text-danger">
                            {{ $errors->first('password') }}
                        </span>
                        @endif

                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                        <button type="submit" class="registerbtn">Register</button>
                        {{-- </div> --}}

                        <div class="container signin">
                            <p>Already have an account? <a href="#">Sign in</a>.</p>
                        </div>
                    </form>
                    {{-- @yield('content') --}}
                </div>
            </div>
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
