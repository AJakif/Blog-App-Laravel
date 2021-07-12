<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="{{URL::to('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/upload/user_image')}}/{{ $LoggedUserInfo->profile_img}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('admin.profile')}}" class="d-block">{{ $LoggedUserInfo['username'] }}</a>
        </div>
      </div> 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <!-- Profile Menu -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/dashboard/editprofile/{{ $LoggedUserInfo['id'] }}" class="nav-link ">
                  <i class="fas fa-user-edit"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('auth.logout') }}" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Blog Menu -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.create.blog') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.blog.tag') }}" class="nav-link ">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Blog Tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.blog.cat') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.comment')}}" class="nav-link">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>Comments</p>
                </a>
              </li>
            </ul>
          </li>

          
          </li>
          <li class="nav-header">Website</li>
          <li class="nav-item">
            <a href="{{route('settings')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>
            
          <li class="nav-header">MISCELLANEOUS</li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>