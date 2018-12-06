
<div class="container-scroller" id="app">
  <!-- partial:../../partials/_navbar.html -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="../../index.html">
        <img src="../../images/logo.svg" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="../../index.html">
        <img src="../../images/logo-mini.svg" alt="logo" />
      </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
        <li class="nav-item">
          <a href="#" class="nav-link">Schedule
            <span class="badge badge-primary ml-1">New</span>
          </a>
        </li>
        <li class="nav-item active">
          <a href="#" class="nav-link">
            <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
              <noti></noti>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="profile-text">Hello, {{ \Auth::user()->name }} !</span>
                <img class="img-xs rounded-circle" src="../../images/faces/face1.jpg" alt="Profile image">
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2">
                  Manage Accounts
                </a>
                <a class="dropdown-item">
                  Change Password
                </a>
                <a class="dropdown-item">
                  Check Inbox
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}">
                  Sign Out
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="user-wrapper">
                  <div class="profile-image">
                    <img src="../../images/faces/face1.jpg" alt="profile image">
                  </div>
                  <div class="text-wrapper">
                    <p class="profile-name">{{ \Auth::user()->name }}</p>
                    <div>
                      <small class="designation text-muted">{{ App\Admin::find(\Auth::user()->admin_id)->role}}</small>
                      <span class="status-indicator online"></span>
                    </div>
                  </div>
                </div>
                <button class="btn btn-success btn-block">New Project
                  <i class="mdi mdi-plus"></i>
                </button>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.index')}}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('subcategory.create')}}">
                <i class="menu-icon mdi mdi-backup-restore"></i>
                <span class="menu-title">Sub Category Create</span>
              </a>
            </li>
            @if(App\Admin::find(\Auth::user()->admin_id)->role=="superadmin")
            <li class="nav-item">
              <a class="nav-link" href="{{ route('adminregister') }}">
                <i class="menu-icon mdi mdi-backup-restore"></i>
                <span class="menu-title">Admin Register</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.checkout')}}">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Checkout Table</span>
              </a>
            </li>
            @endif
            @if(App\Admin::find(\Auth::user()->admin_id)->role=="admin")
            <li class="nav-item">
              <a class="nav-link" href="{{route('admincheckout')}}">
                <i class="menu-icon mdi mdi-sticker"></i>
                <span class="menu-title">Checkout Table</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-restart"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/login.html"> Login </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/register.html"> Register </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>