<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ route('home') }}" class="logo"><i class="md md-terrain"></i> <span>Shortner </span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <a href="#" class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="hide-phone float-left">
                    <form role="search" class="navbar-form">
                        <input type="text" placeholder="Type here for search..." class="form-control search-bar">
                        <a href="#" class="btn btn-search"><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

            <ul class="nav navbar-right float-right list-inline">
                <li class="dropdown d-none d-sm-block">
                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                        <i class="md md-notifications"></i> <span class="badge badge-pill badge-xs badge-danger">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg">
                        <li class="text-center notifi-title">Notification</li>
                        <li class="list-group">
                           <!-- list item-->
                           <a href="javascript:void(0);" class="list-group-item">
                              <div class="media">
                                 <div class="media-left pr-2">
                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                 </div>
                                 <div class="media-body clearfix">
                                    <div class="media-heading">New user registered</div>
                                    <p class="m-0">
                                       <small>You have 10 unread messages</small>
                                    </p>
                                 </div>
                              </div>
                           </a>
                           <!-- list item-->
                            <a href="javascript:void(0);" class="list-group-item">
                              <div class="media">
                                 <div class="media-left pr-2">
                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                 </div>
                                 <div class="media-body clearfix">
                                    <div class="media-heading">New settings</div>
                                    <p class="m-0">
                                       <small>There are new settings available</small>
                                    </p>
                                 </div>
                              </div>
                            </a>
                            <!-- list item-->
                            <a href="javascript:void(0);" class="list-group-item">
                              <div class="media">
                                 <div class="media-left pr-2">
                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                 </div>
                                 <div class="media-body clearfix">
                                    <div class="media-heading">Updates</div>
                                    <p class="m-0">
                                       <small>There are
                                          <span class="text-primary">2</span> new updates available</small>
                                    </p>
                                 </div>
                              </div>
                            </a>
                           <!-- last list item -->
                            <a href="javascript:void(0);" class="list-group-item">
                              <small>See all notifications</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="d-none d-sm-block">
                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                </li>
                <li class="d-none d-sm-block">
                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                </li>
                <li class="dropdown open">
                    @if(Auth::user()->image)
                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset(Auth::user()->image) }}" alt="user-img" class="rounded-circle"> </a>
                    @else
                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('backend/') }}/assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle"> </a>
                    @endif
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile') }}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile</a></li>
                        <li><a href="{{ route('password') }}" class="dropdown-item"><i class="md md-settings mr-2"></i> Settings</a></li>
                        <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="md md-settings-power mr-2"></i> Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- Top Bar End -->
