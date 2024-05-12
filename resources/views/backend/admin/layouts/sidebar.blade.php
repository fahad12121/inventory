<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ current_route() == 'admin.dashboard' ? 'active' : '' }}"><a
                    href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="nav.dash.main">Dashboard</span></a>
            </li>
            <li class="nav-item {{ current_route() == 'admin.product.fetchProduct' ? 'active' : '' }}"><a
                    href="{{ route('admin.product.fetchProduct') }}"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="nav.dash.main">Products</span></a>
            </li>
            <li
                class="nav-item {{ current_route() == 'admin.category.index' || current_route() == 'admin.parentcategory.index' || current_route() == 'admin.brand.fetfetchs' ? 'open' : '' }}">
                <a href="#"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="nav.dash.main">Forms</span></a>
                <ul class="menu-content">
                    <li class="{{ current_route() == 'admin.parentcategory.index' ? 'active' : '' }}"><a
                            class="menu-item" href="{{ route('admin.parentcategory.index') }}"
                            data-i18n="nav.dash.ecommerce">Parent Category</a>
                    </li>
                    <li class="{{ current_route() == 'admin.category.index' ? 'active' : '' }}"><a class="menu-item"
                            href="{{ route('admin.category.index') }}" data-i18n="nav.dash.crypto">Category</a>
                    </li>
                    <li class="{{ current_route() == 'admin.brand.fetfetchs' ? 'active' : '' }}"><a class="menu-item"
                            href="{{ route('admin.brand.fetfetchs') }}" data-i18n="nav.dash.crypto">Brands</a>
                    </li>
                   
                </ul>
            </li>

        </ul>
    </div>
</div>
