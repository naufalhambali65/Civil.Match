  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="/" class="nav-link">Homepage</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block @if (Request::is('admin')) active @endif">
              <a href="/admin" class="nav-link">Dashboard</a>
          </li>
          @if (auth()->user()->user_role == 'jobseeker')
              <li class="nav-item d-none d-sm-inline-block @if (Request::is('admin/jobseeker')) active @endif">
                  <a href="/admin/jobseeker" class="nav-link">Profile</a>
              </li>
          @endif
          @if (auth()->user()->user_role == 'company')
              <li class="nav-item d-none d-sm-inline-block @if (Request::is('admin/company')) active @endif">
                  <a href="/admin/company" class="nav-link">Company Profile</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block @if (Request::is('admin/posts*')) active @endif">
                  <a href="/admin/posts" class="nav-link">Posts</a>
              </li>
          @endif

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
              <form action="/logout" method="post">
                  @csrf
                  <button type="input" class="nav-link border-0 bg-transparent">Logout</button>
              </form>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
