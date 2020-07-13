<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">M-shop</a>
    @if(!auth()->guard('clients')->logout())

    {{-- @if(auth()->guard('clients')->user()) --}}
    <div class="text-right">
        <a href="{{route('client-logout')}}" class="btn btn-danger">Logout</a>
    </div>
    @else
    <div class="text-right">
        <a href="{{route('client-login-form')}}" class="btn btn-primary">Login</a>
        <a href="{{route('client-register-form')}}" class="btn btn-light">Register</a>
    </div>
    @endif

</nav>
