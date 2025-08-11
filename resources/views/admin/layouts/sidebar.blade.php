  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="text-center logo-container mt-1 brand-link">
          <h3>
              <span class="brand-text font-weight-light">
                  <strong>CIVIL.MATCH</strong>
              </span>
          </h3>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-bars"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  @if (auth()->user()->user_role == 'company')
                      <li class="nav-item">
                          <a href="/admin/company" class="nav-link {{ Request::is('admin/company') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-briefcase"></i>
                              <p>
                                  Company Profile
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/admin/posts" class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-file-alt"></i>
                              <p>
                                  Posts
                              </p>
                          </a>
                      </li>
                  @endif
                  @if (auth()->user()->user_role == 'jobseeker')
                      <li class="nav-item">
                          <a href="/admin/jobseeker"
                              class="nav-link {{ Request::is('admin/jobseeker') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  Profile
                              </p>
                          </a>
                      </li>
                  @endif
                  {{-- <li class="nav-item">
                      <a href="/admin/messages" class="nav-link {{ Request::is('admin/messages') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-envelope"></i>
                          <p>
                              Message
                          </p>
                      </a>
                  </li> --}}
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
