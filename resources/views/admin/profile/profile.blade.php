@extends('admin.layout.app')

@section('title') Profile ({{ $user['username'] }}) - ApiDocs @endsection

@section('css')
@section('css')
<style type="text/css">
  .sidebar-content {
    background-color: rgb(220, 109, 23) !important;
  }

  .sidebar-content .nav-container .navigation-main .nav-item {
    border-color: orange;
  }

  .sidebar-content .nav-container .navigation-main .nav-item a {
    color: white;
  }

  .sidebar-content .nav-container .navigation-main .nav-item a i {
    color: rgb(0, 0, 0);
  }

  .sidebar-content .nav-container .navigation-main .nav-item .submenu-content {
    background-color: orange;
  }

  .sidebar-content .nav-container .navigation-main .nav-item.open::after,
  .sidebar-content .nav-container .navigation-main .nav-item.active::after {
    background-color: rgb(0, 0, 0);
  }

  .nav-lavel {
    font-size: 14px;
    font-weight: 400;
    opacity: 1;
    padding: 8px 20px;
    text-transform: capitalize;
    visibility: visible;
    width: 100%;
    background: #272d36 !important;
  }

  /* Updated Header-top CSS */ 
  .header-top {
    background-color:rgb(240, 139, 62) !important; /* Light orange */
    z-index: 1030;
    position: relative;
    padding: 15px 0;
    position: fixed;
    top: 0;
    width: 100%;
    left: 0;
    padding-left: 240px;
    box-shadow: 0 1px 15px rgba(0, 0, 0, 0.04), 0 1px 6px rgba(0, 0, 0, 0.04);
  }

  .header-top .top-menu .dropdown {
    margin-left: 10px;
  }

  .header-top .top-menu .dropdown-menu {
    margin-top: 10px;
  }

  .header-top .top-menu .dropdown-menu.menu-grid {
    width: 182px;
  }

  .header-top .top-menu .dropdown-menu.menu-grid .dropdown-item {
    display: inline-block;
    width: 40px;
    height: 40px;
    text-align: center;
    padding: 0;
    line-height: 40px;
    font-size: 18px;
    color:rgb(0, 0, 0);
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown {
    min-width: 300px;
    padding: 0;
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .header {
    margin: 0;
    padding: 15px;
    font-size: 16px;
    border-bottom: 1px solidrgb(231, 137, 37);
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media {
    border-bottom: 1px solidrgb(1, 2, 2);
    padding: 10px;
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media:nth-child(odd) {
    background:rgb(250, 248, 248);
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media .d-flex {
    display: flex;
    align-items: flex-start;
    margin-right: 15px;
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media .d-flex i {
    color: #fff;
    text-align: center;
    font-size: 15px;
    line-height: 30px;
    top: 0;
    height: 30px;
    width: 30px;
    background: rgb(220, 109, 23);
    border-radius: 50%;
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media img {
    height: 30px;
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media-body {
    font-size: 12px;
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media-body .media-heading {
    color: #444;
    font-weight: 600;
  }

  .header-top .top-menu .dropdown-menu.notification-dropdown .notifications-wrap .media-body .media-content {
    color:rgb(220, 109, 23);
  }

  /* New CSS added */
  .top-menu {
    .nav-link {
      color: rgb(220, 109, 23);
      background-color: transparent; /* Assuming $empty means transparent */
    }

    .header-search {
      .input-group {
        .input-group-addon {
          color: rgb(220, 109, 23);
        }
      }
    }
  }

  /* New Colored Sidebar CSS */
  &.colored {
    .sidebar-header {
      background-color: Orange;s
    }
    .sidebar-header .header-brand {
      color: white; /* Assuming $white is white */
    }
  }
</style>
<style type="text/css">

</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
     <div class="col-lg-8">
        <div class="page-header-title">
           <i class="ik user ik-user bg-blue"></i>
           <div class="d-inline">
              <h5>Profile</h5>
              <span>Here you can view and edit your profile detailes.</span>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{{ $user['name'] }}"><i class="ik ik-home"></i></a>
         </li>
         <li class="breadcrumb-item">
             <a href="#">Profile</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">{{ $user['username'] }}</li>
     </ol>
 </nav>
</div>
</div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card new-cust-card">
            <div class="card-body">
                <div class="text-center"> 
                    <img src="{{ asset('admin_assets/avatars/admin/admin.png') }}" class="rounded-circle" width="150">
                    <h4 class="card-title mt-10">{{ $user['name'] }}</h4>
                    <p class="text-dark font-weight-bold">{{ $user['username'] }}</p>
                    <p class="text-muted">Super Admin</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Profile</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade active show" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        
                        @if($errors->any())
                        <div class="alert {{ session()->get('bgcolor') }} text-light alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>

                        @endif

                        

                        <form class="form-horizontal" method="post" action="{{ $form_url }}">
                            @csrf

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" placeholder="@johnathan_doe" class="form-control" name="username" id="username" value="{{ $user['username'] }}">
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" placeholder="johnathan@admin.com" class="form-control" id="email" value="{{ $user['email'] }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="password">Current Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <span class="text-muted">*Please Enter current Password to save your Profile.</span>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password (*if you want to change your password.)">
                                <span class="text-danger"></span>
                            </div>

                            <button class="btn btn-success" type="submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection