<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            {{-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> --}}
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link {{Route::currentRouteName()=='home.index'? 'active':''}}">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Admin</a>
        </li>
    </ul>
    <div class="ml-auto">
        @if(isset(auth()->guard('clients')->user()->name) || isset(auth()->guard('users')->user()->name))
        <div class="text-right">
            <a href="{{route('client-logout')}}" class="btn btn-danger">Logout</a>
        </div>
        @else
        <div class="text-right">
            <a href="{{route('client-login-form')}}" class="btn btn-primary">Login</a>
            <a href="{{route('client-register-form')}}" class="btn btn-light">Register</a>
        </div>

        @endif
        <!-- Right navbar links -->
    </div>
</nav>
