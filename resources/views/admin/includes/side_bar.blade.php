<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                @if(Auth::user()->image)
                <img src="{{ asset(Auth::user()->image) }}" alt="" class="thumb-md rounded-circle">
                @else
                <img src="{{ asset('backend/') }}/assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle">
                @endif
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile') }}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="{{ route('password') }}" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                        <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="md md-settings-power mr-2"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                <p class="text-muted m-0">{{ Auth::user()->designation }}</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
