<li class="nav-item dropdown" data-placement="left" data-trigger="hover" data-toggle="tooltip"
    data-original-title="{{ Auth::user()->name }}">
    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
       data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="{{ URL::to(Portrait::get()) }}" alt="...">
                <i></i>
              </span>
    </a>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
            <i class="icon md-key" aria-hidden="true"></i>  Change Password
        </a>
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
            <i class="icon md-settings" aria-hidden="true"></i> Setting
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ url('/lock') }}" role="menuitem">
            <i class="icon md-eye-off" aria-hidden="true"></i> Lock
        </a>
        <a class="dropdown-item" href="{{ url('/logout') }}" role="menuitem">
            <i class="icon md-power" aria-hidden="true"></i> Sign out
        </a>
    </div>
</li>