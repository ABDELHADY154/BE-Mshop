<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    @if(!auth()->guard('clients')->logout())
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/admin-style/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <h3 class="d-block">{{Auth::guard('clients')->user()->name}}</h3>
        </div>
    </div>
    @endif

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @include('layouts.front.menu')
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
