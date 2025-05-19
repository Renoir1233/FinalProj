@extends('admin.layout.app')

@section('title') Create Deduction @endsection

@section('css')
@section('css')
<style type="text/css">
  .sidebar-content {
    background-color: rgb(231, 107, 12) !important;
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
    background-color:rgb(218, 109, 25) !important; /* Light orange */
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
  .overflow-visible {
    overflow: visible !important;
  }

  .modal-sm {
    width: auto;
    max-width: 356px !important;
  }

  .select2-container--default {
    display: block;
    width: auto !important;
  }

  .text-warning small {
    font-size: 0.875rem;
  }
</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
     <div class="col-lg-8">
        <div class="page-header-title">
           <i class="ik ik-file-minus bg-blue"></i>
           <div class="d-inline">
              <h5>Create Deduction</h5>
              <span>Create Deduction, Please fill all field correctly.</span>
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
             <a href="{{ route('admin.deduction.index') }}">Deduction</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">Create</li>
     </ol>
 </nav>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12 col-xl-6 offset-md-3 offset-xl-3">

        <div class="widget overflow-visible">
            <div class="progress progress-sm progress-hi-3 hidden">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
            <div class="widget-body">
                <div class="overlay hidden">
                    <i class="ik ik-refresh-ccw loading"></i>
                    <span class="overlay-text">New Deduction Creating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="Deduction">
                        <h5 class="text-secondary">Create Deduction</h5>
                    </div>
                </div>

                <form action="{{ $form_store }}" method="POST" id="createDeduction">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label><small class="text-danger">*</small>
                        <input type="text" name="name" class="form-control" id="name" placeholder="ex: Standard Deduction" autocomplete="off">
                        <small class="text-danger err" id="name-err"></small>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label><small class="text-danger">*</small>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="ex: 200.15" autocomplete="off">
                        <small class="text-danger err" id="amount-err"></small>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" name="description" placeholder="Some description about Deduction..."></textarea>
                          <small class="text-danger err" id="value-err"></small>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="ik save ik-save"></i>Submit</button>
                    
                    <a href="{{ route('admin.deduction.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function($) {
  $("#createDeduction").submit(function(event){
    event.preventDefault();
    createForm("#createDeduction");
  });
});
</script>
@endsection