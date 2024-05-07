<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin - @yield('title')</title>
    <meta name="description"
        content="Materialize – is the most developer friendly &amp; highly customizable Admin Dashboard Template." />
    <meta name="keywords"
        content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="7SeWWcmvizr1pKBPwooOiwcq4SVggGEgeAFC1GkR">
    <!-- Canonical SEO -->
    <link rel="canonical"
        href="https://themeforest.net/item/materialize-material-design-admin-template/11446068?irgwc=1&amp;clickid=&amp;iradid=275988&amp;irpid=1244113&amp;iradtype=ONLINE_TRACKING_LINK&amp;irmptype=mediapartner&amp;mp_value1=&amp;utm_campaign=af_impact_radius_1244113&amp;utm_medium=affiliate&amp;utm_source=impact_radius">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('demo/assets/img/favicon/favicon.ico')}}" />


    <!-- Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');
    </script>
    <!-- End Google Tag Manager -->


    <!-- Include Styles -->
    <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="../../../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../../../fonts.gstatic.com/index.html" crossorigin>
    <link href="../../../../fonts.googleapis.com/css21eba.css?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
        href="{{asset('demo/assets/vendor/fonts/materialdesigniconsc84d.css?id=6dcb6840ed1b54e81c4279112d07827e')}}" />
    <link rel="stylesheet"
        href="{{asset('demo/assets/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../demo/assets/vendor/css/rtl/core4ce1.css?id=84e90b89d4346ba5b549f814933f56c1')}}"
        class="template-customizer-core-css" />
    <link rel="stylesheet"
        href="{{asset('demo/assets/vendor/css/rtl/theme-defaultbbfe.css?id=a5b74f63f911baabfa8b02a06ecfc64c')}}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('demo/assets/css/demo3199.css?id=b0748c2ad4338911d21615a7692027bd')}}" />


    <!-- Vendor Styles -->
    <link rel="stylesheet"
        href="{{asset('demo/assets/vendor/libs/node-waves/node-wavesd178.css?id=aa72fb97dfa8e932ba88c8a3c04641bc')}}" />
    <link rel="stylesheet"
        href="{{asset('demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar936b.css?id=e712540dc55d810eb04058a2c7adde74')}}" />
    <link rel="stylesheet"
        href="{{asset('demo/assets/vendor/libs/typeahead-js/typeahead9693.css?id=9edd1831c1d7cdbc4ff9cca42bf26999')}}" />
    <link rel="stylesheet" href="{{asset('demo/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('demo/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{asset('demo/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{asset('demo/assets/vendor/libs/swiper/swiper.css')}}" />


    <!-- Page Styles -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('demo/assets/vendor/css/pages/cards-statistics.css')}}">
    <link rel="stylesheet" href="{{asset('demo/assets/vendor/css/pages/cards-analytics.css')}}">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
    <!-- laravel style -->
    <script src="{{asset('demo/assets/vendor/js/helpers.js')}}"></script>
    <!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="{{asset('demo/assets/vendor/js/template-customizer.js')}}"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{asset('demo/assets/js/config.js')}}"></script>

  <script>
      window.templateCustomizer = new TemplateCustomizer({
          cssPath: '',
          themesPath: '',
          defaultStyle: "light",
          defaultShowDropdownOnHover: "true", // true/false (for horizontal layout only)
          displayCustomizer: "true",
          lang: 'en',
          pathResolver: function(path) {
              var resolvedPaths = {
                  // Core stylesheets
                  'core.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=84e90b89d4346ba5b549f814933f56c1',
                  'core-dark.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/core-dark.css?id=56393a9e9ca3b3c80a47e4bc59b03832',

                  // Themes
                  'theme-default.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=a5b74f63f911baabfa8b02a06ecfc64c',
                  'theme-default-dark.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default-dark.css?id=8b5937608e22a4a15f291494ec107064',
                  'theme-bordered.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered.css?id=aecb8491d176004d9f3b3f8d93641879',
                  'theme-bordered-dark.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered-dark.css?id=73dc67574b56c6dae3cb9f628c0ebd4a',
                  'theme-semi-dark.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark.css?id=3d719b360981903a81b1808c59cbaf26',
                  'theme-semi-dark-dark.css': 'https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=32e2e9b755bdf097142e4f239af82dc0',
              }
              return resolvedPaths[path] || path;
          },
          'controls': ["rtl", "style", "headerType", "contentLayout", "layoutCollapsed", "layoutNavbarOptions",
              "themes"
          ],
      });
  </script>
</head>