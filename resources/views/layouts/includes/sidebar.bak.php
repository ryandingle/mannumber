<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <!-- <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"> -->
                &nbsp;
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ (Route::currentRoutename() == 'dashboard' || Route::currentRoutename() == 'index') ? 'active' : ''}}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ (Route::currentRoutename() == 'request' || Route::currentRoutename() == 'employee') ? 'active' : ''}}">
                <a href="{{ route('request') }}">
                    <i class="fa fa-send"></i> <span>Request</span>
                </a>
            </li>
            <li class="{{ (Route::currentRoutename() == 'account') ? 'active' : ''}}">
                <a href="{{ route('account') }}">
                    <i class="fa fa-user"></i> <span>Account</span>
                </a>
            </li>
            <li class="{{ (Route::currentRoutename() == 'user') ? 'active' : ''}}"><a href="{{ route('user') }}"><i class="fa fa-users text-blue"></i> <span>Users Management</span></a></li>
            <li class="{{ (Route::currentRoutename() == 'role') ? 'active' : ''}}"><a href="{{ route('role') }}"><i class="fa fa-circle-o text-red"></i> <span>Roles</span></a></li>
            <li class="{{ (Route::currentRoutename() == 'permission') ? 'active' : ''}}"><a href="{{ route('permission') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Permissions</span></a></li>
            <li class="{{ (Route::currentRoutename() == 'module') ? 'active' : ''}}"><a href="{{ route('module') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Modules</span></a></li>
        </ul>
    </section>
</aside>