  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
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
  <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  <script>
      const get_url = (url, id) => {
          return url.replace('item_id', id);
      }

      const ele = (id) => {
          return document.getElementById(id);
      }

      function convertDate(item) {
          // Create a Date object from the UTC date string
          var utcDate = new Date(item);

          // Get year, month, day, hours, minutes, and seconds
          var year = utcDate.getUTCFullYear();
          var month = ('0' + (utcDate.getUTCMonth() + 1)).slice(-2);
          var day = ('0' + utcDate.getUTCDate()).slice(-2);
          var hours = ('0' + utcDate.getUTCHours()).slice(-2);
          var minutes = ('0' + utcDate.getUTCMinutes()).slice(-2);
          var seconds = ('0' + utcDate.getUTCSeconds()).slice(-2);

          // Construct the formatted date string
          var formattedDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

          return formattedDateTime;
      }
  </script>
  @yield('scripts')
