<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link {{Route::currentRouteName()=='home.index'? 'active':''}}">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        </li>
    </ul>
    <div class="ml-auto">

        @if(auth('clients') && auth()->guard('clients')->user())
        <div class="text-right">
            <form action="{{route('client-logout')}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
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
