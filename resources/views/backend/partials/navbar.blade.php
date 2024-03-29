<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('main') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->



        <!-- Notifications Dropdown Menu -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @auth
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            @endauth
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->

              <!-- Menu Body -->

              <!-- Menu Footer-->

              <li class="user-footer">

                  <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>

              </li>
            </ul>
          </li>

    </ul>
</nav>
<!-- /.navbar -->
