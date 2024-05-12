  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"
      type="text/javascript"></script>
  <script src="{{ asset('app-assets/data/jvector/visitor-data.js') }}" type="text/javascript"></script>
  </script>
  <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
  
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  @if (current_route() == 'admin.dashboard')
      <script src="{{ asset('app-assets/js/scripts/pages/dashboard-sales.js') }}" type="text/javascript"></script>
  @endif
  <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  <script>
      const get_url = (url, id) => {
          return url.replace('item_id', id);
      }
  </script>
  @yield('scripts')
