<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('backend.admin.layouts.head')

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
    <div class="wrapper">
        @include('backend.admin.layouts.header')

        @include('backend.admin.layouts.sidebar')

        @yield('content')

        @include('backend.admin.layouts.footer')
    </div>


    @include('backend.admin.layouts.scripts')
</body>

</html>
