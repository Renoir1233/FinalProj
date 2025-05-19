<style>
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

<!-- Live Attendance HTML -->
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade active show" id="live" role="tabpanel" aria-labelledby="pills-timeline-tab">

    <!--Live Attendance Data-->
    <div class="card-header">
      <div class="col-md-6 d-block">
        <a href="{{ $add_new }}" class="btn btn-sm btn-dark float-left">
          <i class="ik plus-square ik-plus-square"></i> Create New Attendance
        </a>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary mb-2 h-33 float-right move-to-delete-all" id="apply" disabled="true" data-href="{{ $moveToTrashAllLink }}">Action</button>
      </div>
    </div>

    <div class="card-body table-responsive">
      <table id="overtime_data_table" class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Employee Details</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Working Hour</th>
            <th>Actions</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!--End Live Attendance Data-->

  </div>
</div>

<!-- DataTables Script -->
<script type="text/javascript">
  $(document).ready(function () {
    var merchantDataTable = $("table#overtime_data_table").DataTable({
      "processing": true,
      "serverSide": true,
      "pagingType": "full_numbers",
      "pageLength": 25,
      "autoWidth": false,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      "ajax": {
        "url": "{{ $getDataTable }}",
        "type": "POST"
      },
      "columnDefs": [
        {
          'targets': 6,
          'searchable': false,
          'orderable': false,
          'render': function (data, type, full, meta) {
            return "<div class='custom-control custom-checkbox pl-1 align-self-center'><label class='custom-control custom-checkbox mb-0'><input type='checkbox' class='custom-control-input sub_chk' data-id='" + $('<div/>').text(data).html() + "'><span class='custom-control-label'></span></label></div>";
          }
        },
        {
          'targets': [0, 4, 5, 6],
          'searchable': false,
          'orderable': false,
          "className": "text-center"
        }
      ],
      "columns": [
        { "data": "date" },
        { "data": "employee" },
        { "data": "time_in_details" },
        { "data": "time_out" },
        { "data": "whr" },
        { "data": "action" },
        { "data": "id" }
      ],
    });
  });
</script>
