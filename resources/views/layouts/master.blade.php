<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset("css/app.css")}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div id="app" class="wrapper" style="background: #FFFFFF !important">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset("img/logo/female.jpg")}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>                                                                                                        
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
            <img src="{{asset("img/logo/female.jpg")}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              {{-- <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> --}}
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #1A237E">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{asset("img/logo/will.jpeg")}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset("img/logo/female.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/home" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </router-link>
              </li>
              
            </ul>
          </li> --}}
          {{-- @if (\App\Access::where('user_id', Auth::user()->id)-> === 0) --}}
             
          {{-- @if ({{\App\Access::where('user_id', Auth::user()->id)->first() === 1}}) --}}
          <li  class="nav-item">
            <router-link to="/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt indigo"></i>
              <p>
              Dashboard
                {{-- <span class="right badge badge-danger">new</span> --}}
              </p>
            </router-link>
          </li>
              
          {{-- @endif --}}
                   
        {{-- <li v-show="get.check_users" class="nav-item"> --}}
        <li v-show="users_ok" class="nav-item">
          <router-link to="/user" class="nav-link">
            <i class="nav-icon fas fa-users-cog yellow"></i>
            <p>
            Users
            <span class="right badge badge-danger">@{{users_ok}}</span>
            </p>
          </router-link>
        </li>
               {{-- @endif --}}
              {{-- @endcan --}}
          {{-- <li v-show="get.check_lead" class="nav-item"> --}}
          <li v-show="lead_ok" class="nav-item">
            <router-link to="/leads" class="nav-link">
              <i class="nav-icon far fa-user pink"></i>
              <p>
                Leads
                <span class="right badge badge-danger">{{\App\Model\Lead::where('isLead', 1)->count()}}</span>
              </p>
            </router-link>
          </li>
          {{-- @can('isAdmin') --}}
            
          {{-- <li v-show="get.check_client" class="nav-item"> --}}
          <li v-show="client_ok" class="nav-item">
            <router-link to="/clients" class="nav-link">
              <i class="nav-icon fas fa-users orange"></i>
              <p>
                Clients
              <span class="right badge badge-danger">{{\App\Model\Lead::where('isLead', 0)->count()}}</span>
              </p>
            </router-link>
          </li>
          <li class="nav-item" v-show="activity_ok">
            <router-link to="/activity" class="nav-link">
              <i class="nav-icon fas fas fa-hiking" style="color:lightgreen"></i>
              <p>
                Activity
              {{-- <span class="right badge badge-danger">{{\App\Model\Lead::where('isLead', 0)->count()}}</span> --}}
              </p>
            </router-link>
          </li>
          {{-- @endcan --}}
          {{-- <li v-show="get.check_client" class="nav-item has-treeview menu-close"> --}}
          <li v-show="oparation_ok" class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tasks cyan"></i>
              <p>
                Oparation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul  class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/roundonecomplete" class="nav-link ">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Round 1 done </p>
                  <span class="right badge badge-danger">{{\App\Model\Lead::where(['isLead' => 0, "isR_one_done" => 1])->count()}}</span>
                </router-link>
              </li>
              <li  class="nav-item">
                <router-link to="/roundtwocomplete" class="nav-link ">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Round 2 done </p>
                  <span class="right badge badge-danger">{{\App\Model\Lead::where(['isLead' => 0, "isR_one_done" => 1, "isR_two_done" => 1])->count()}}</span>
                </router-link>
              </li>
              <li  class="nav-item">
                <router-link to="/roundthreecomplete" class="nav-link ">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Round 3 done </p>
                  <span class="right badge badge-danger">{{\App\Model\Lead::where(['isLead' => 0, "isR_one_done" => 1, "isR_two_done" => 1, "isR_three_done" => 1])->count()}}</span>
                </router-link>
              </li>
             
            </ul>
          </li>
          <li style="display: none" class="nav-item">
            <router-link to="/developer" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Developer
              
              </p>
            </router-link>
          </li>
          <li v-show="setting_ok" class="nav-item">
            <router-link to="/setting" class="nav-link">
              <i class="nav-icon fas fa-radiation yellow"></i>
              <p>
                Permissions 
              
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off nav-icon red"></i>
                <p>
                    {{ __('Logout') }}
                </p>
             </a>
  
         <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
             @csrf
         </form>
    </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <router-view></router-view>
       
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="background: #1A237E">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://kit.fontawesome.com/bad080b564.js" crossorigin="anonymous"></script>
<script src="{{asset("js/app.js")}}"></script>
<script>
  @auth
    window.user = @json(auth()->user())
  @endauth
</script>
</body>
</html>