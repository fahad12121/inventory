<!DOCTYPE html>

<html lang="en" class="light-style layout-compact layout-navbar-fixed layout-menu-fixed     " dir="ltr"
    data-theme="theme-default"
    data-assets-path="https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo/assets/"
    data-base-url="https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo-1" data-framework="laravel"
    data-template="vertical-menu-theme-default-light">


<!-- Mirrored from demos.pixinvent.com/materialize-html-laravel-admin-template/demo-1/dashboard/crm by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 09:21:37 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - CRM |
        Materialize -
        Materialize - Bootstrap 5 HTML Laravel Admin Template</title>
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
    <link rel="icon" type="image/x-icon" href="../../demo/assets/img/favicon/favicon.ico" />


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
        href="../../demo/assets/vendor/fonts/materialdesigniconsc84d.css?id=6dcb6840ed1b54e81c4279112d07827e" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../demo/assets/vendor/css/rtl/core4ce1.css?id=84e90b89d4346ba5b549f814933f56c1"
        class="template-customizer-core-css" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/css/rtl/theme-defaultbbfe.css?id=a5b74f63f911baabfa8b02a06ecfc64c"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../demo/assets/css/demo3199.css?id=b0748c2ad4338911d21615a7692027bd" />


    <!-- Vendor Styles -->
    <link rel="stylesheet"
        href="../../demo/assets/vendor/libs/node-waves/node-wavesd178.css?id=aa72fb97dfa8e932ba88c8a3c04641bc" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar936b.css?id=e712540dc55d810eb04058a2c7adde74" />
    <link rel="stylesheet"
        href="../../demo/assets/vendor/libs/typeahead-js/typeahead9693.css?id=9edd1831c1d7cdbc4ff9cca42bf26999" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="../../demo/assets/vendor/libs/swiper/swiper.css" />


    <!-- Page Styles -->
    <!-- Page -->
    <link rel="stylesheet" href="../../demo/assets/vendor/css/pages/cards-statistics.css">
    <link rel="stylesheet" href="../../demo/assets/vendor/css/pages/cards-analytics.css">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
    <!-- laravel style -->
    <script src="../../demo/assets/vendor/js/helpers.js"></script>
    <!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="../../demo/assets/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../../demo/assets/js/config.js"></script>

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

<body>
  
      <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
    

  <!-- Layout Content -->
  <div class="layout-wrapper layout-content-navbar ">
  <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
    <a href="https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo-1" class="app-brand-link">
      <span class="app-brand-logo demo"><span>
  <svg width="25" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z" fill="var(--bs-primary)" />
    <path d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z" fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z" fill="var(--bs-primary)" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="var(--bs-primary)" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z" fill="var(--bs-primary)" />
    <defs>
      <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138" x2="10.532" y2="24.104" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
      <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139" x2="10.3357" y2="24.1155" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
    </defs>
  </svg>
</span>
</span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">Materialize</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z" fill="currentColor" fill-opacity="0.6" />
        <path d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z" fill="currentColor" fill-opacity="0.38" />
      </svg>
    </a>
  </div>
  
  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    
    

    
    
    
    
    
    <li class="menu-item active open">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div>Dashboards</div>
                <div class="badge bg-primary rounded-pill ms-auto">5</div>

              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/dashboard.html" class="menu-link" >
                    <div>eCommerce</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item active">
        <a href="crm.html" class="menu-link" >
                    <div>CRM</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo-1" class="menu-link" >
                    <div>Analytics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/logistics/dashboard.html" class="menu-link" >
                    <div>Logistics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/academy/dashboard.html" class="menu-link" >
                    <div>Academy</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-window-maximize"></i>
                <div>Layouts</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../layouts/collapsed-menu.html" class="menu-link" >
                    <div>Collapsed menu</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/content-navbar.html" class="menu-link" >
                    <div>Content navbar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/content-nav-sidebar.html" class="menu-link" >
                    <div>Content nav + Sidebar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/horizontal.html" class="menu-link"  target="_blank" >
                    <div>Horizontal</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/without-menu.html" class="menu-link" >
                    <div>Without menu</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/without-navbar.html" class="menu-link" >
                    <div>Without navbar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/fluid.html" class="menu-link" >
                    <div>Fluid</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/container.html" class="menu-link" >
                    <div>Container</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../layouts/blank.html" class="menu-link"  target="_blank" >
                    <div>Blank</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-flip-to-front"></i>
                <div>Front Pages</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../front-pages/landing.html" class="menu-link"  target="_blank" >
                    <div>Landing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../front-pages/pricing.html" class="menu-link"  target="_blank" >
                    <div>Pricing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../front-pages/payment.html" class="menu-link"  target="_blank" >
                    <div>Payments</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../front-pages/checkout.html" class="menu-link"  target="_blank" >
                    <div>Checkout</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../front-pages/help-center.html" class="menu-link"  target="_blank" >
                    <div>Help Center</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-language-php"></i>
                <div>Laravel Example</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../laravel/user-management.html" class="menu-link" >
                    <div>User Management</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
        <li class="menu-header fw-medium mt-4">
      <span class="menu-header-text">Apps &amp; Pages</span>
    </li>

        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../app/email.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                <div>Email</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../app/chat.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-message-outline"></i>
                <div>Chat</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../app/calendar.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-calendar-blank-outline"></i>
                <div>Calendar</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../app/kanban.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-view-grid-outline"></i>
                <div>Kanban</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-cart-outline"></i>
                <div>eCommerce</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/dashboard.html" class="menu-link" >
                    <div>Dashboard</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Products</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/product/list.html" class="menu-link" >
                    <div>Product List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/product/add.html" class="menu-link" >
                    <div>Add Product</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/product/category.html" class="menu-link" >
                    <div>Category List</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Order</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/order/list.html" class="menu-link" >
                    <div>Order List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/order/details.html" class="menu-link" >
                    <div> Order Details</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Customer</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/customer/all.html" class="menu-link" >
                    <div>All Customers</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Customer Details</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/customer/details/overview.html" class="menu-link" >
                    <div>Overview</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/customer/details/security.html" class="menu-link" >
                    <div>Security</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/customer/details/billing.html" class="menu-link" >
                    <div>Address &amp; Billing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/customer/details/notifications.html" class="menu-link" >
                    <div>Notifications</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/manage/reviews.html" class="menu-link" >
                    <div>Manage Reviews</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/referrals.html" class="menu-link" >
                    <div>Referrals</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Settings</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/settings/details.html" class="menu-link" >
                    <div>Store details</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/settings/payments.html" class="menu-link" >
                    <div>Payments</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/settings/checkout.html" class="menu-link" >
                    <div>Checkout</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/settings/shipping.html" class="menu-link" >
                    <div>Shipping &amp; Delivery</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/settings/locations.html" class="menu-link" >
                    <div>Locations</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/ecommerce/settings/notifications.html" class="menu-link" >
                    <div>Notifications</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-notebook-outline"></i>
                <div>Academy</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/academy/dashboard.html" class="menu-link" >
                    <div>Dashboard</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/academy/course.html" class="menu-link" >
                    <div>My Course</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/academy/course-details.html" class="menu-link" >
                    <div>Course Details</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-truck-outline"></i>
                <div>Logistics</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/logistics/dashboard.html" class="menu-link" >
                    <div>Dashboard</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/logistics/fleet.html" class="menu-link" >
                    <div>Fleet</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
                <div>Invoice</div>
                <div class="badge bg-danger rounded-pill ms-auto">4</div>

              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/invoice/list.html" class="menu-link" >
                    <div>List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/invoice/preview.html" class="menu-link" >
                    <div>Preview</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/invoice/edit.html" class="menu-link" >
                    <div>Edit</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/invoice/add.html" class="menu-link" >
                    <div>Add</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div>Users</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/user/list.html" class="menu-link" >
                    <div>List</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>View</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/user/view/account.html" class="menu-link" >
                    <div>Account</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/user/view/security.html" class="menu-link" >
                    <div>Security</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/user/view/billing.html" class="menu-link" >
                    <div>Billing &amp; Plans</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/user/view/notifications.html" class="menu-link" >
                    <div>Notifications</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/user/view/connections.html" class="menu-link" >
                    <div>Connections</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-shield-outline"></i>
                <div>Roles &amp; Permissions</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../app/access-roles.html" class="menu-link" >
                    <div>Roles</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../app/access-permission.html" class="menu-link" >
                    <div>Permission</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-file-outline"></i>
                <div>Pages</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>User Profile</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../pages/profile-user.html" class="menu-link" >
                    <div>Profile</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/profile-teams.html" class="menu-link" >
                    <div>Teams</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/profile-projects.html" class="menu-link" >
                    <div>Projects</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/profile-connections.html" class="menu-link" >
                    <div>Connections</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Account Settings</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../pages/account-settings-account.html" class="menu-link" >
                    <div>Account</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/account-settings-security.html" class="menu-link" >
                    <div>Security</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/account-settings-billing.html" class="menu-link" >
                    <div>Billing &amp; Plans</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/account-settings-notifications.html" class="menu-link" >
                    <div>Notifications</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/account-settings-connections.html" class="menu-link" >
                    <div>Connections</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/faq.html" class="menu-link" >
                    <div>FAQ</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/pricing.html" class="menu-link" >
                    <div>Pricing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Misc</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../pages/misc-error.html" class="menu-link"  target="_blank" >
                    <div>Error</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/misc-under-maintenance.html" class="menu-link"  target="_blank" >
                    <div>Under Maintenance</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/misc-comingsoon.html" class="menu-link"  target="_blank" >
                    <div>Coming Soon</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/misc-not-authorized.html" class="menu-link"  target="_blank" >
                    <div>Not Authorized</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../pages/misc-server-error.html" class="menu-link"  target="_blank" >
                    <div>Server Error</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-lock-outline"></i>
                <div>Authentications</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Login</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../auth/login-basic.html" class="menu-link"  target="_blank" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../auth/login-cover.html" class="menu-link"  target="_blank" >
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Register</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../auth/register-basic.html" class="menu-link"  target="_blank" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../auth/register-cover.html" class="menu-link"  target="_blank" >
                    <div>Cover</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../auth/register-multisteps.html" class="menu-link"  target="_blank" >
                    <div>Multi-steps</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Verify Email</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../auth/verify-email-basic.html" class="menu-link"  target="_blank" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../auth/verify-email-cover.html" class="menu-link"  target="_blank" >
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Reset Password</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../auth/reset-password-basic.html" class="menu-link"  target="_blank" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../auth/reset-password-cover.html" class="menu-link"  target="_blank" >
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Forgot Password</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../auth/forgot-password-basic.html" class="menu-link"  target="_blank" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../auth/forgot-password-cover.html" class="menu-link"  target="_blank" >
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Two Steps</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../auth/two-steps-basic.html" class="menu-link"  target="_blank" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../auth/two-steps-cover.html" class="menu-link"  target="_blank" >
                    <div>Cover</div>
        </a>

        
              </li>
      </ul>
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-transit-connection-horizontal"></i>
                <div>Wizard Examples</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../wizard/ex-checkout.html" class="menu-link" >
                    <div>Checkout</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../wizard/ex-property-listing.html" class="menu-link" >
                    <div>Property Listing</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../wizard/ex-create-deal.html" class="menu-link" >
                    <div>Create Deal</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../modal-examples.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-vector-arrange-below"></i>
                <div>Modal Examples</div>
              </a>

      
          </li>
        
    

    
        <li class="menu-header fw-medium mt-4">
      <span class="menu-header-text">Components</span>
    </li>

        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-credit-card-outline"></i>
                <div>Cards</div>
                <div class="badge bg-primary rounded-pill ms-auto">6</div>

              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../cards/basic.html" class="menu-link" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../cards/advance.html" class="menu-link" >
                    <div>Advance</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../cards/statistics.html" class="menu-link" >
                    <div>Statistics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../cards/analytics.html" class="menu-link" >
                    <div>Analytics</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../cards/gamifications.html" class="menu-link" >
                    <div>Gamifications</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../cards/actions.html" class="menu-link" >
                    <div>Actions</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-archive-outline"></i>
                <div>User interface</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../ui/accordion.html" class="menu-link" >
                    <div>Accordion</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/alerts.html" class="menu-link" >
                    <div>Alerts</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/badges.html" class="menu-link" >
                    <div>Badges</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/buttons.html" class="menu-link" >
                    <div>Buttons</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/carousel.html" class="menu-link" >
                    <div>Carousel</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/collapse.html" class="menu-link" >
                    <div>Collapse</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/dropdowns.html" class="menu-link" >
                    <div>Dropdowns</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/footer.html" class="menu-link" >
                    <div>Footer</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/list-groups.html" class="menu-link" >
                    <div>List Groups</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/modals.html" class="menu-link" >
                    <div>Modals</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/navbar.html" class="menu-link" >
                    <div>Navbar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/offcanvas.html" class="menu-link" >
                    <div>Offcanvas</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/pagination-breadcrumbs.html" class="menu-link" >
                    <div>Pagination &amp; Breadcrumbs</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/progress.html" class="menu-link" >
                    <div>Progress</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/spinners.html" class="menu-link" >
                    <div>Spinners</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/tabs-pills.html" class="menu-link" >
                    <div>Tabs &amp; Pills</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/toasts.html" class="menu-link" >
                    <div>Toasts</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/tooltips-popovers.html" class="menu-link" >
                    <div>Tooltips &amp; Popovers</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../ui/typography.html" class="menu-link" >
                    <div>Typography</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-star-outline"></i>
                <div>Extended UI</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../extended/ui-avatar.html" class="menu-link" >
                    <div>Avatar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-blockui.html" class="menu-link" >
                    <div>BlockUI</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-drag-and-drop.html" class="menu-link" >
                    <div>Drag &amp; Drop</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-media-player.html" class="menu-link" >
                    <div>Media Player</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-perfect-scrollbar.html" class="menu-link" >
                    <div>Perfect Scrollbar</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-star-ratings.html" class="menu-link" >
                    <div>Star Ratings</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-sweetalert2.html" class="menu-link" >
                    <div>SweetAlert2</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-text-divider.html" class="menu-link" >
                    <div>Text Divider</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="javascript:void(0)" class="menu-link menu-toggle" >
                    <div>Timeline</div>
        </a>

        
                  <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../extended/ui-timeline-basic.html" class="menu-link" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-timeline-fullscreen.html" class="menu-link" >
                    <div>Fullscreen</div>
        </a>

        
              </li>
      </ul>
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-tour.html" class="menu-link" >
                    <div>Tour</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-treeview.html" class="menu-link" >
                    <div>Treeview</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../extended/ui-misc.html" class="menu-link" >
                    <div>Miscellaneous</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../icons/icons-mdi.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-google-circles-extended"></i>
                <div>Icons</div>
              </a>

      
          </li>
        
    

    
        <li class="menu-header fw-medium mt-4">
      <span class="menu-header-text">Forms &amp; Tables</span>
    </li>

        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-form-select"></i>
                <div>Form Elements</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../forms/basic-inputs.html" class="menu-link" >
                    <div>Basic Inputs</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/input-groups.html" class="menu-link" >
                    <div>Input groups</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/custom-options.html" class="menu-link" >
                    <div>Custom Options</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/editors.html" class="menu-link" >
                    <div>Editors</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/file-upload.html" class="menu-link" >
                    <div>File Upload</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/pickers.html" class="menu-link" >
                    <div>Pickers</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/selects.html" class="menu-link" >
                    <div>Select &amp; Tags</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/sliders.html" class="menu-link" >
                    <div>Sliders</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/switches.html" class="menu-link" >
                    <div>Switches</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../forms/extras.html" class="menu-link" >
                    <div>Extras</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-cube-outline"></i>
                <div>Form Layouts</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../form/layouts-vertical.html" class="menu-link" >
                    <div>Vertical Form</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../form/layouts-horizontal.html" class="menu-link" >
                    <div>Horizontal Form</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../form/layouts-sticky.html" class="menu-link" >
                    <div>Sticky Actions</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-dots-horizontal"></i>
                <div>Form Wizard</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../form/wizard-numbered.html" class="menu-link" >
                    <div>Numbered</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../form/wizard-icons.html" class="menu-link" >
                    <div>Icons</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../form/validation.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-checkbox-marked-circle-outline"></i>
                <div>Form Validation</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../tables/basic.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-table"></i>
                <div>Tables</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-grid"></i>
                <div>Datatables</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../tables/datatables-basic.html" class="menu-link" >
                    <div>Basic</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../tables/datatables-advanced.html" class="menu-link" >
                    <div>Advanced</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../tables/datatables-extensions.html" class="menu-link" >
                    <div>Extensions</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
        <li class="menu-header fw-medium mt-4">
      <span class="menu-header-text">Charts &amp; Maps</span>
    </li>

        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle" >
                <i class="menu-icon tf-icons mdi mdi-chart-pie-outline"></i>
                <div>Charts</div>
              </a>

      
            <ul class="menu-sub">
      
    
    
      <li class="menu-item ">
        <a href="../charts/apex.html" class="menu-link" >
                    <div>Apex Charts</div>
        </a>

        
              </li>
    
    
    
      <li class="menu-item ">
        <a href="../charts/chartjs.html" class="menu-link" >
                    <div>ChartJS</div>
        </a>

        
              </li>
      </ul>
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="../maps/leaflet.html" class="menu-link" >
                <i class="menu-icon tf-icons mdi mdi-map-outline"></i>
                <div>Leaflet Maps</div>
              </a>

      
          </li>
        
    

    
        <li class="menu-header fw-medium mt-4">
      <span class="menu-header-text">Misc</span>
    </li>

        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="https://pixinvent.ticksy.com/" class="menu-link"  target="_blank" >
                <i class="menu-icon tf-icons mdi mdi-lifebuoy"></i>
                <div>Support</div>
              </a>

      
          </li>
        
    

    
    
    
    
    
    <li class="menu-item ">
      <a href="https://demos.pixinvent.com/materialize-html-admin-template/documentation/laravel-introduction.html" class="menu-link"  target="_blank" >
                <i class="menu-icon tf-icons mdi mdi-file-document-multiple-outline"></i>
                <div>Documentation</div>
              </a>

      
          </li>
          </ul>

</aside>
    

    <!-- Layout page -->
    <div class="layout-page">

      
      

      <!-- BEGIN: Navbar-->
      <!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    
    <!--  Brand demo (display only for navbar-full and hide on below xl) -->
    
    <!-- ! Not required for layout-without-menu -->
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="mdi mdi-menu mdi-24px"></i>
      </a>
    </div>
    
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <!-- Search -->
        <div class="navbar-nav align-items-center">
          <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler fw-normal px-0" href="javascript:void(0);">
              <i class="mdi mdi-magnify mdi-24px scaleX-n1-rtl"></i>
              <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
            </a>
          </div>
        </div>
        <!-- /Search -->
      
      <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Language -->
        <li class="nav-item dropdown-language dropdown me-1 me-xl-0">
          <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class='mdi mdi-translate mdi-24px'></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item active" href="crm.html" data-language="en">
                <span class="align-middle">English</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item " href="crm.html" data-language="fr">
                <span class="align-middle">French</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item " href="crm.html" data-language="de">
                <span class="align-middle">German</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item " href="crm.html" data-language="pt">
                <span class="align-middle">Portuguese</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ Language -->

                <!-- Style Switcher -->
        <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
          <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class='mdi mdi-24px'></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                <span class="align-middle"><i class='mdi mdi-weather-sunny me-2'></i>Light</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                <span class="align-middle"><i class="mdi mdi-weather-night me-2"></i>Dark</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                <span class="align-middle"><i class="mdi mdi-monitor me-2"></i>System</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ Style Switcher -->
        
        <!-- Quick links  -->
        <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
          <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <i class='mdi mdi-view-grid-plus-outline mdi-24px'></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end py-0">
            <div class="dropdown-menu-header border-bottom">
              <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                <a href="javascript:void(0)" class="dropdown-shortcuts-add text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="mdi mdi-view-grid-plus-outline mdi-24px"></i></a>
              </div>
            </div>
            <div class="dropdown-shortcuts-list scrollable-container">
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-calendar fs-4"></i>
                  </span>
                  <a href="../app/calendar.html" class="stretched-link">Calendar</a>
                  <small class="text-muted mb-0">Appointments</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-file-document-outline fs-4"></i>
                  </span>
                  <a href="../app/invoice/list.html" class="stretched-link">Invoice App</a>
                  <small class="text-muted mb-0">Manage Accounts</small>
                </div>
              </div>
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-account-outline fs-4"></i>
                  </span>
                  <a href="../app/user/list.html" class="stretched-link">User App</a>
                  <small class="text-muted mb-0">Manage Users</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-shield-check-outline fs-4"></i>
                  </span>
                  <a href="../app/access-roles.html" class="stretched-link">Role Management</a>
                  <small class="text-muted mb-0">Permission</small>
                </div>
              </div>
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-chart-pie-outline fs-4"></i>
                  </span>
                  <a href="https://demos.pixinvent.com/materialize-html-laravel-admin-template/demo-1" class="stretched-link">Dashboard</a>
                  <small class="text-muted mb-0">Analytics</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-cog-outline fs-4"></i>
                  </span>
                  <a href="../pages/account-settings-account.html" class="stretched-link">Setting</a>
                  <small class="text-muted mb-0">Account Settings</small>
                </div>
              </div>
              <div class="row row-bordered overflow-visible g-0">
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-help-circle-outline fs-4"></i>
                  </span>
                  <a href="../pages/faq.html" class="stretched-link">FAQs</a>
                  <small class="text-muted mb-0">FAQs & Articles</small>
                </div>
                <div class="dropdown-shortcuts-item col">
                  <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                    <i class="mdi mdi-dock-window fs-4"></i>
                  </span>
                  <a href="../modal-examples.html" class="stretched-link">Modals</a>
                  <small class="text-muted mb-0">Useful Popups</small>
                </div>
              </div>
            </div>
          </div>
        </li>
        <!-- Quick links -->

        <!-- Notification -->
        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
          <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <i class="mdi mdi-bell-outline mdi-24px"></i>
            <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end py-0">
            <li class="dropdown-menu-header border-bottom">
              <div class="dropdown-header d-flex align-items-center py-3">
                <h6 class="mb-0 me-auto">Notification</h6>
                <span class="badge rounded-pill bg-label-primary">8 New</span>
              </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container">
              <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <img src="../../demo/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">Congratulation Lettie 🎉</h6>
                      <small class="text-truncate text-body">Won the monthly best seller gold badge</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">1h ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">Charles Franklin</h6>
                      <small class="text-truncate text-body">Accepted your connection</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">12hr ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <img src="../../demo/assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">New Message ✉️</h6>
                      <small class="text-truncate text-body">You have new message from Natalie</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">1h ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <span class="avatar-initial rounded-circle bg-label-success"><i class="mdi mdi-cart-outline"></i></span>
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">Whoo! You have new order 🛒 </h6>
                      <small class="text-truncate text-body">ACME Inc. made new order $1,154</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">1 day ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <img src="../../demo/assets/img/avatars/9.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">Application has been approved 🚀 </h6>
                      <small class="text-truncate text-body">Your ABC project application has been approved.</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">2 days ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <span class="avatar-initial rounded-circle bg-label-success"><i class="mdi mdi-chart-pie-outline"></i></span>
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">Monthly report is generated</h6>
                      <small class="text-truncate text-body">July monthly financial report is generated </small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">3 days ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <img src="../../demo/assets/img/avatars/5.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">Send connection request</h6>
                      <small class="text-truncate text-body">Peter sent you connection request</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">4 days ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <img src="../../demo/assets/img/avatars/6.png" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">New message from Jane</h6>
                      <small class="text-truncate text-body">Your have new message from Jane</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">5 days ago</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                  <div class="d-flex gap-2">
                    <div class="flex-shrink-0">
                      <div class="avatar me-1">
                        <span class="avatar-initial rounded-circle bg-label-warning"><i class="mdi mdi-alert-circle-outline"></i></span>
                      </div>
                    </div>
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1">CPU is running high</h6>
                      <small class="text-truncate text-body">CPU Utilization Percent is currently at 88.63%,</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <small class="text-muted">5 days ago</small>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown-menu-footer border-top p-2">
              <a href="javascript:void(0);" class="btn btn-primary d-flex justify-content-center">
                View all notifications
              </a>
            </li>
          </ul>
        </li>
        <!--/ Notification -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="../../demo/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="../pages/profile-user.html">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="../../demo/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-medium d-block">
                                            John Doe
                                          </span>
                    <small class="text-muted">Admin</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="../pages/profile-user.html">
                <i class="mdi mdi-account-outline me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
                        <li>
              <a class="dropdown-item" href="../pages/account-settings-billing.html">
                <i class="mdi mdi-credit-card-outline me-2"></i>
                <span class="align-middle">Billing</span>
              </a>
            </li>
                        <li>
              <div class="dropdown-divider"></div>
            </li>
                        <li>
              <a class="dropdown-item" href="../auth/login-basic.html">
                <i class='mdi mdi-login me-2'></i>
                <span class="align-middle">Login</span>
              </a>
            </li>
                      </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper  d-none">
      <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
      <i class="mdi mdi-close search-toggler cursor-pointer"></i>
    </div>
    </nav>
<!-- / Navbar -->
<!-- END: Navbar-->


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <div class="row gy-4 mb-4">
  <!-- Congratulations card -->
  <div class="col-xl-4">
    <div class="card h-100">
      <div class="card-body text-nowrap">
        <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">Congratulations Norris! 🎉</h4>
        <p class="pb-0">Best seller of the month</p>
        <h4 class="text-primary mb-1">$42.8k</h4>
        <p class="mb-2 pb-1">78% of target 🚀</p>
        <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
      </div>
      <img src="../../demo/assets/img/illustrations/trophy.png" class="position-absolute bottom-0 end-0 me-3" height="140" alt="view sales">
    </div>
  </div>
  <!--/ Congratulations card -->

  <!-- Total Profit -->
  <div class="col-xl-2 col-md-3 col-sm-6">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
          <div class="avatar">
            <div class="avatar-initial bg-label-primary rounded">
              <i class="mdi mdi-cart-plus mdi-24px"></i>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <p class="mb-0 text-success me-1">+22%</p>
            <i class="mdi mdi-chevron-up text-success"></i>
          </div>
        </div>
        <div class="card-info mt-4 pt-1">
          <h5 class="mb-2">155k</h5>
          <p>Total Order</p>
          <div class="badge bg-label-secondary rounded-pill">Last 4 Month</div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Profit -->

  <!-- Total Expenses -->
  <div class="col-xl-2 col-md-3 col-sm-6">
    <div class="card h-100">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
          <div class="avatar">
            <div class="avatar-initial bg-label-success rounded">
              <i class="mdi mdi-currency-usd mdi-24px"></i>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <p class="mb-0 text-success me-1">+38%</p>
            <i class="mdi mdi-chevron-up text-success"></i>
          </div>
        </div>
        <div class="card-info mt-4 pt-1">
          <h5 class="mb-2">$13.4k</h5>
          <p>Total Sales</p>
          <div class="badge bg-label-secondary rounded-pill">Last Six Month</div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Expenses -->

  <!-- Total Profit chart -->
  <div class="col-xl-2 col-md-3 col-sm-6">
    <div class="card h-100">
      <div class="card-header pb-0">
        <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
          <h4 class="mb-0 me-2">$88.5k</h4>
          <p class="mb-0 text-danger">-18%</p>
        </div>
        <span class="d-block mb-2 text-body">Total Profit</span>
      </div>
      <div class="card-body">
        <div id="totalProfitChart"></div>
      </div>
    </div>
  </div>
  <!--/ Total Profit chart -->

  <!-- Total Growth chart -->
  <div class="col-xl-2 col-md-3 col-sm-6">
    <div class="card h-100">
      <div class="card-header pb-0">
        <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
          <h4 class="mb-0 me-2">$27.9k</h4>
          <p class="mb-0 text-success">+16%</p>
        </div>
        <span class="d-block mb-2 text-body">Total Growth</span>
      </div>
      <div class="card-body">
        <div id="totalGrowthChart"></div>
      </div>
    </div>
  </div>
  <!--/ Total Sales chart -->
</div>
<div class="row gy-4">
  <!-- Organic Sessions Chart-->
  <div class="col-lg-4 col-md-6 order-1 order-lg-0">
    <div class="card">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Organic Sessions</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="organicSessionsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="organicSessionsDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="organicSessionsChart"></div>
      </div>
    </div>
  </div>
  <!--/ Organic Sessions Chart-->

  <!-- Project Timeline Chart-->
  <div class="col-lg-8 col-12">
    <div class="card">
      <div class="row">
        <div class="col-md-8 col-12">
          <div class="card-header">
            <h5 class="mb-1">Project Timeline</h5>
            <p class="mb-0 text-body">Total 840 Task Completed</p>
          </div>
          <div class="card-body px-2">
            <div id="projectTimelineChart"></div>
          </div>
        </div>
        <div class="col-md-4 col-12 border-start">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">Project List</h5>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="projectTimeline" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-dots-vertical mdi-24px"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectTimeline">
                  <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                  <a class="dropdown-item" href="javascript:void(0);">Share</a>
                  <a class="dropdown-item" href="javascript:void(0);">Update</a>
                </div>
              </div>
            </div>
            <p class="text-body mb-0">4 Ongoing Project</p>
          </div>
          <div class="card-body">
            <div class="d-flex align-items-center mb-3 pb-1">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-cellphone mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <h6 class="mb-1">IOS Application</h6>
                <small>Task 840/2.5K</small>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3 pb-1">
              <div class="avatar">
                <div class="avatar-initial bg-label-success rounded">
                  <i class="mdi mdi-creation mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <h6 class="mb-1">Web Application</h6>
                <small>Task 99/1.42k</small>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3 pb-1">
              <div class="avatar">
                <div class="avatar-initial bg-label-secondary rounded">
                  <i class="mdi mdi-credit-card-outline mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <h6 class="mb-1">Bank Dashboard</h6>
                <small>Task 58/100</small>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-label-info rounded">
                  <i class="mdi mdi-pencil-ruler-outline mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3 d-flex flex-column">
                <h6 class="mb-1">UI Kit Design</h6>
                <small>Task 120/350</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Project Timeline Chart-->

  <!-- Weekly Overview Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Weekly Overview</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
              <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="weeklyOverviewChart"></div>
        <div class="mt-1">
          <div class="d-flex align-items-center gap-3">
            <h3 class="mb-0">62%</h3>
            <p class="mb-0">Your sales performance is 35% 😎 better compared to last month</p>
          </div>
          <div class="d-grid mt-3">
            <button class="btn btn-primary" type="button">Details</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Weekly Overview Chart -->

  <!-- Social Network Visits -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Social Network Visits</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="socialNetworkList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="socialNetworkList">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="d-flex align-items-center mb-1">
            <h4 class="mb-0">28,468</h4>
            <span class="text-success ms-2 fw-medium">
              <i class="mdi mdi-menu-up"></i>
              <small>62%</small>
            </span>
          </div>
          <small>Last 1 Year Visits</small>
        </div>
        <ul class="p-0 m-0">
          <li class="d-flex mb-3">
            <div class="flex-shrink-0">
              <img src="../../demo/assets/img/icons/brands/facebook-rounded.png" alt="facebook" class="me-3" height="34">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Facebook</h6>
                <small>Social Media</small>
              </div>
              <div class="d-flex align-items-center">
                <span class="h6 mb-0">12,348</span>
                <div class="ms-3 badge bg-label-success rounded-pill">+12%</div>
              </div>
            </div>
          </li>
          <li class="d-flex mb-3">
            <div class="flex-shrink-0">
              <img src="../../demo/assets/img/icons/brands/dribbble-rounded.png" alt="dribbble" class="me-3" height="34">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Dribbble</h6>
                <small>Community</small>
              </div>
              <div class="d-flex align-items-center">
                <span class="h6 mb-0">8,450</span>
                <div class="ms-3 badge bg-label-success rounded-pill">+32%</div>
              </div>
            </div>
          </li>
          <li class="d-flex mb-3">
            <div class="flex-shrink-0">
              <img src="../../demo/assets/img/icons/brands/twitter-rounded.png" alt="facebook" class="me-3" height="34">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Twitter</h6>
                <small>Social Media</small>
              </div>
              <div class="d-flex align-items-center">
                <span class="h6 mb-0">350</span>
                <div class="ms-3 badge bg-label-danger rounded-pill">-18%</div>
              </div>
            </div>
          </li>
          <li class="d-flex">
            <div class="flex-shrink-0">
              <img src="../../demo/assets/img/icons/brands/instagram-rounded.png" alt="instagram" class="me-3" height="34">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Instagram</h6>
                <small>Social Media</small>
              </div>
              <div class="d-flex align-items-center">
                <span class="h6 mb-0">25,566</span>
                <div class="ms-3 badge bg-label-success rounded-pill">+42%</div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Social Network Visits -->

  <!-- Monthly Budget Chart-->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header pb-1">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">Monthly Budget</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="monthlyBudgetDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="monthlyBudgetDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="monthlyBudgetChart"></div>
        <div class="mt-3">
          <p class="mb-0">Last month you had $2.42 expense transactions, 12 savings entries and 4 bills.</p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Monthly Budget Chart-->

  <!-- Meeting Schedule -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Meeting Schedule</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="meetingSchedule" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="meetingSchedule">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="../../demo/assets/img/avatars/4.png" alt="avatar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Call with Woods</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-primary rounded-pill">Business</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="../../demo/assets/img/avatars/5.png" alt="avatar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Conference call</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-warning rounded-pill">Dinner</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="../../demo/assets/img/avatars/3.png" alt="avatar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Meeting with Mark</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-secondary rounded-pill">Meetup</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="../../demo/assets/img/avatars/14.png" alt="avatar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Meeting in Oakland</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-danger rounded-pill">Dinner</div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="../../demo/assets/img/avatars/8.png" alt="avatar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Call with hilda</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-success rounded-pill">Meditation</div>
            </div>
          </li>
          <li class="d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <img src="../../demo/assets/img/avatars/1.png" alt="avatar" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Meeting with Carl</h6>
                <small>
                  <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                  <span>21 Jul | 08:20-10:30</span>
                </small>
              </div>
              <div class="badge bg-label-primary rounded-pill">Business</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Meeting Schedule -->


  <!-- External Links Chart -->
  <div class="col-xl-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h5 class="mb-1">External Links</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="externalLinksDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-dots-vertical mdi-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="externalLinksDropdown">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="externalLinksChart"></div>
        <div class="table-responsive text-nowrap">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td class="text-start pb-0 ps-0">
                  <div class="d-flex align-items-center">
                    <div class="badge badge-dot bg-primary me-2"></div>
                    <h6 class="mb-0">Google Analytics</h6>
                  </div>
                </td>
                <td class="pb-0">
                  <p class="mb-0">$845k</p>
                </td>
                <td class="pe-0 pb-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <h6 class="mb-0 me-2">82%</h6>
                    <i class="mdi mdi-chevron-up text-success"></i>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-start pb-0 ps-0">
                  <div class="d-flex align-items-center">
                    <div class="badge badge-dot bg-secondary me-2"></div>
                    <h6 class="mb-0">Facebook Ads</h6>
                  </div>
                </td>
                <td class="pb-0">
                  <p class="mb-0">$12.5k</p>
                </td>
                <td class="pe-0 pb-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <h6 class="mb-0 me-2">52%</h6>
                    <i class="mdi mdi-chevron-down text-danger"></i>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--/ External Links Chart -->

  <!-- Payment History -->
  <div class="col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Payment History</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="paymentHistory" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="paymentHistory">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-borderless">
          <thead class="border-bottom">
            <tr>
              <th class="text-capitalize text-body fw-medium fs-6">Card</th>
              <th class="text-capitalize text-body fw-medium fs-6">Date</th>
              <th class="text-end text-capitalize text-body fw-medium fs-6">Spend</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="d-flex pt-3">
                <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                  <img src="../../demo/assets/img/icons/payments/logo-visa.png" alt="credit-card" width="30">
                </div>
                <div class="ms-3">
                  <h6 class="mb-0">*4399</h6>
                  <small>Credit Card</small>
                </div>
              </td>
              <td class="small pt-3">05/Jan</td>

              <td class="text-end pt-3">
                <div class="ms-2">
                  <h6 class="mb-0">-$2,820</h6>
                  <small>$10,450</small>
                </div>
              </td>
            </tr>
            <tr>
              <td class="d-flex">
                <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                  <img src="../../demo/assets/img/icons/payments/logo-mastercard.png" alt="debit-card" width="30">
                </div>
                <div class="ms-3">
                  <h6 class="mb-0">*5545</h6>
                  <small>Debit Card</small>
                </div>
              </td>
              <td class="small">12/Feb</td>

              <td class="text-end">
                <div class="ms-2">
                  <h6 class="mb-0">-$345</h6>
                  <small>$8,709</small>
                </div>
              </td>
            </tr>
            <tr>
              <td class="d-flex">
                <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                  <img src="../../demo/assets/img/icons/payments/logo-american-express.png" alt="atm-card" width="30">
                </div>
                <div class="ms-3">
                  <h6 class="mb-0">*9860</h6>
                  <small>ATM Card</small>
                </div>
              </td>
              <td class="small">24/Feb</td>

              <td class="text-end">
                <div class="ms-2">
                  <h6 class="mb-0">-$999</h6>
                  <small>$25,900</small>
                </div>
              </td>
            </tr>
            <tr>
              <td class="d-flex">
                <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                  <img src="../../demo/assets/img/icons/payments/logo-visa.png" alt="debit-card" width="30">
                </div>
                <div class="ms-3">
                  <h6 class="mb-0">*4300</h6>
                  <small>Credit Card</small>
                </div>
              </td>
              <td class="small">08/Mar</td>

              <td class="text-end">
                <div class="ms-2">
                  <h6 class="mb-0">-$8,453</h6>
                  <small>$9,233</small>
                </div>
              </td>
            </tr>
            <tr>
              <td class="d-flex">
                <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                  <img src="../../demo/assets/img/icons/payments/logo-mastercard.png" alt="credit-card" width="30">
                </div>
                <div class="ms-3">
                  <h6 class="mb-0">*5545</h6>
                  <small>Debit Card</small>
                </div>
              </td>
              <td class="small">15/Apr</td>

              <td class="text-end">
                <div class="ms-2">
                  <h6 class="mb-0">-$24</h6>
                  <small>$500</small>
                </div>
              </td>
            </tr>
            <tr>
              <td class="d-flex">
                <div class="px-2 rounded bg-lighter d-flex align-items-center h-px-30">
                  <img src="../../demo/assets/img/icons/payments/logo-visa.png" alt="credit-card" width="30">
                </div>
                <div class="ms-3">
                  <h6 class="mb-0">*4399</h6>
                  <small>Credit Card</small>
                </div>
              </td>
              <td class="small">28/Apr</td>

              <td class="text-end">
                <div class="ms-2">
                  <h6 class="mb-0">-$299</h6>
                  <small>$1,380</small>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--/ Payment History -->


  <!-- Most Sales in Countries -->
  <div class="col-lg-4 col-md-6 order-2 order-lg-0">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Most Sales in Countries</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="mostSales" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-dots-vertical mdi-24px"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="mostSales">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body py-0">
        <div class="mb-4 mt-1">
          <div class="d-flex align-items-center">
            <h1 class="mb-0 me-3 display-3">22,842</h1>
            <div class="badge bg-label-success rounded-pill">+42%</div>
          </div>
          <small class="mt-1">Sales Last 90 Days</small>
        </div>
        <div class="table-responsive text-nowrap border-top">
          <table class="table">
            <tbody class="table-border-bottom-0">
              <tr>
                <td class="ps-0 pe-5"><span class="text-heading">Australia</span></td>
                <td class="text-end"><span class="text-heading fw-medium">18,879</span></td>
                <td class="pe-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="text-heading fw-medium me-2">15%</span>
                    <i class="mdi mdi-chevron-down mdi-20px text-danger"></i>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="ps-0 pe-5"><span class="text-heading">Canada</span></td>
                <td class="text-end"><span class="text-heading fw-medium">10,357</span></td>
                <td class="pe-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="text-heading fw-medium me-2">85%</span>
                    <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="ps-0 pe-5"><span class="text-heading">India</span></td>
                <td class="text-end"><span class="text-heading fw-medium">4,860</span></td>
                <td class="pe-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="text-heading fw-medium me-2">48%</span>
                    <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="ps-0 pe-5"><span class="text-heading">France</span></td>
                <td class="text-end"><span class="text-heading fw-medium">2,560</span></td>
                <td class="pe-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="text-heading fw-medium me-2">36%</span>
                    <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="ps-0 pe-5"><span class="text-heading">United State</span></td>
                <td class="text-end"><span class="text-heading fw-medium">899</span></td>
                <td class="pe-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="text-heading fw-medium me-2">16%</span>
                    <i class="mdi mdi-chevron-down mdi-20px text-danger"></i>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="ps-0 pe-5"><span class="text-heading">Japan</span></td>
                <td class="text-end"><span class="text-heading fw-medium">43</span></td>
                <td class="pe-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="text-heading fw-medium me-2">35%</span>
                    <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="ps-0 pe-5"><span class="text-heading">Brazil</span></td>
                <td class="text-end"><span class="text-heading fw-medium">18</span></td>
                <td class="pe-0">
                  <div class="d-flex align-items-center justify-content-end">
                    <span class="text-heading fw-medium me-2">12%</span>
                    <i class="mdi mdi-chevron-up mdi-20px text-success"></i>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--/ Most Sales in Countries -->

  <!-- Roles Datatables -->
  <div class="col-lg-8 col-12">
    <div class="card">
      <div class="table-responsive rounded-3">
        <table class="datatables-crm table table-sm">
          <thead class="table-light">
            <tr>
              <th class="py-3"></th>
              <th class="py-3">User</th>
              <th class="py-3">Email</th>
              <th class="py-3">Role</th>
              <th class="py-3">Status</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

          </div>
          <!-- / Content -->

          <!-- Footer -->
                    <!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        © <script>
            document.write(new Date().getFullYear())
        </script>,
        made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span> by <a href="https://pixinvent.com/" target="_blank" class="footer-link fw-medium">Pixinvent</a>
      </div>
      <div class="d-none d-lg-inline-block">
        <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
        <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More Themes</a>
        <a href="https://demos.pixinvent.com/materialize-html-admin-template/documentation/laravel-introduction.html" target="_blank" class="footer-link me-4">Documentation</a>
        <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer-->
                    <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

        <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
    <!--/ Layout Content -->

  
  <div class="buy-now">
    <a href="https://1.envato.market/materialize_admin" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
  </div>
  

  <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Vendor JS-->
<script src="../../demo/assets/vendor/libs/jquery/jquery1e84.js?id=0f7eb1f3a93e3e19e8505fd8c175925a"></script>
<script src="../../demo/assets/vendor/libs/popper/popper0a73.js?id=baf82d96b7771efbcc05c3b77135d24c"></script>
<script src="../../demo/assets/vendor/js/bootstrap672c.js?id=b6c06656efc82e323d7fd0162235c958"></script>
<script src="../../demo/assets/vendor/libs/node-waves/node-waves259f.js?id=4fae469a3ded69fb59fce3dcc14cd638"></script>
<script
    src="../../demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a">
</script>
<script src="../../demo/assets/vendor/libs/hammer/hammer2de0.js?id=0a520e103384b609e3c9eb3b732d1be8"></script>
<script src="../../demo/assets/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
<script src="../../demo/assets/vendor/js/menu2dc9.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
<script src="../../demo/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../../demo/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="../../demo/assets/vendor/libs/swiper/swiper.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="../../demo/assets/js/main2a22.js?id=e46da52cc43e079943fb6810bf346c25"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="../../demo/assets/js/dashboards-crm.js"></script>
<!-- END: Page JS-->

</body>


<!-- Mirrored from demos.pixinvent.com/materialize-html-laravel-admin-template/demo-1/dashboard/crm by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 09:21:54 GMT -->
</html>
