{{-- <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">M-shop</a>
    @if(auth()->guard('clients')->logout())
    <div class="text-right">
        <a href="{{route('client-logout')}}" class="btn btn-danger">Logout</a>
</div>
@else
<div class="text-right">
    <a href="{{route('client-login-form')}}" class="btn btn-primary">Login</a>
    <a href="{{route('client-register-form')}}" class="btn btn-light">Register</a>
</div>
@endif

</nav> --}}
<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <form action="{{ route('logout') }}" method="post" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-link nav-link">Logout</button>
            </form>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}
    <div class="text-right">
        @if(auth()->guard('clients')->logout())
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
