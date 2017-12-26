<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img style="{{ (!Auth::user()->image) ? 'display: none' : '' }}" class="profile-user-img img-responsive img-circle image-section" src="{{ Auth::user()->image }}" alt="User profile picture">
                &nbsp;
            </div>
            <div class="pull-left info">
                <p class="name">{{ Auth::user()->username }}</p>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            @if(session('modules'))
                @foreach(session('modules') as $module)
                <li class="{{ (Route::currentRoutename() == $module->prefix) ? 'active' : ''}}">
                    <a href="{{ route($module->prefix) }}">
                        <i class="fa {{ $module->icon }}"></i> <span>{{ $module->title }}</span>
                    </a>
                </li>
                @endforeach
            @endif
        </ul>
    </section>
</aside>