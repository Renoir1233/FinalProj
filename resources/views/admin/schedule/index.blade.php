@extends('admin.layout.app')

@section('title') Schedule @endsection

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
    .overflow-visible{
        overflow: visible !important;
    }
    td.p-0 img.img-thumbnail{
      width: 140px;
    }
    button.h-33{
      height: 33px !important;
    }
</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="ik ik-clock bg-blue"></i>
        <div class="d-inline">
          <h5>Schedule</h5>
          <span>You can show and manage Schedule from here.</span>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}"><i class="ik ik-home"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('admin.schedule.index') }}">Schedule</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">List of Schedule</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 mt-4">
      <div class="card">
        <!--Tab content-->
        <div class="loader br-4 hidden">
          <i class="ik ik-refresh-cw loading"></i>
          <span class="loader-text">Data Fetching....</span>
        </div>
        <div class="tabs_contant">
          <div class="card-header">
            <h5>List of Schedule</h5>
          </div>
          <div class="card-body">
              
          </div>
        </div>
        <!--End Tab Content-->
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form id="deleteForm" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" name="submit" class="hidden">
        </form>
    </div>
</div>

<div class="showBannerModel">
 
</div>

@endsection

@section('js')
<script type="text/javascript">

$(document).ready(function() {
  // get data from serve ajax
  const getDataUrl = "{{ $get_data }}"
  getData(getDataUrl);
  
  //single record move to trash
  $(document).on('click','a.move-to-trash',function(){
    var trashRecordUrl = $(this).data('href');
    moveToTrashOrDelete(trashRecordUrl);
  });

  //select all checkboxes
  checkbox("#master",".sub_chk",'#apply');

  //selected record move to trash
  $(document).on('click','.move-to-trash-all', function(e) {
    e.preventDefault();
    var trashAllRecordUrl = $(this).data('href');
    moveToTrashAllOrDelete(trashAllRecordUrl);
  });
});
</script>
@endsection