<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ current_route() == 'admin.dashboard' ? 'active' : '' }}"><a
                    href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="nav.dash.main">Dashboard</span></a>
            </li>

            @if (Auth::user()->role_id === 2)
                <li class="nav-item {{ current_route() == 'admin.product.fetchProduct' ? 'active' : '' }}"><a
                        href="{{ route('admin.product.fetchProduct') }}"><i class="la la-list"></i><span
                            class="menu-title" data-i18n="nav.dash.main">Products</span></a>
                </li>
                <li
                    class="nav-item {{ current_route() == 'admin.stock.fetchStock' || current_route() == 'admin.stock.fetchStockEmp' ? 'open' : '' }}">
                    <a href="#"><i class="la la-tablet"></i><span class="menu-title"
                            data-i18n="nav.dash.main">Stock
                            Issue</span></a>
                    <ul class="menu-content">
                        <li class="{{ current_route() == 'admin.stock.fetchStock' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.stock.fetchStock') }}"
                                data-i18n="nav.dash.ecommerce">Branch</a>
                        </li>
                        <li class="{{ current_route() == 'admin.stock.fetchStockEmp' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.stock.fetchStockEmp') }}"
                                data-i18n="nav.dash.crypto">Employee</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ current_route() == 'admin.removal.fetchRemoval' ? 'open' : '' }}">
                    <a href="#"><i class="la la-tablet"></i><span class="menu-title"
                            data-i18n="nav.dash.main">Removals</span></a>
                    <ul class="menu-content">
                        <li class="{{ current_route() == 'admin.removal.fetchRemoval' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.removal.fetchRemoval') }}"
                                data-i18n="nav.dash.ecommerce">Removal</a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item {{ current_route() == 'admin.service.fetchService' ? 'active' : '' }}"><a
                        href="{{ route('admin.service.fetchService') }}"><i class="la la-tablet"></i><span
                            class="menu-title" data-i18n="nav.dash.main">Services</span></a>
                </li>
                {{-- <li class="nav-item {{ current_route() == 'admin.service.fetchCompany' ? 'active' : '' }}"><a
                        href="{{ route('admin.service.fetchCompany') }}"><i class="la la-tablet"></i><span
                            class="menu-title" data-i18n="nav.dash.main">Company</span></a>
                </li> --}}

                <li
                    class="nav-item {{ current_route() == 'admin.category.fetchCategories' || current_route() == 'admin.parentcategory.index' || current_route() == 'admin.brand.fetfetchs' ? 'open' : '' }}">
                    <a href="#"><i class="la la-file"></i><span class="menu-title"
                            data-i18n="nav.dash.main">Forms</span></a>
                    <ul class="menu-content">
                        <li class="{{ current_route() == 'admin.parentcategory.index' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.parentcategory.index') }}"
                                data-i18n="nav.dash.ecommerce">Parent Category</a>
                        </li>
                        <li class="{{ current_route() == 'admin.category.fetchCategories' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.category.fetchCategories') }}"
                                data-i18n="nav.dash.crypto">Category</a>
                        </li>
                        <li class="{{ current_route() == 'admin.brand.fetfetchs' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.brand.fetfetchs') }}"
                                data-i18n="nav.dash.crypto">Brands</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ current_route() == 'admin.branch.fetchbranch' ? 'open' : '' }}">
                    <a href="#"><i class="la la-users"></i><span class="menu-title"
                            data-i18n="nav.dash.main">Users</span></a>
                    <ul class="menu-content">
                        <li class="{{ current_route() == 'admin.branch.fetchbranch' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.branch.fetchbranch') }}"
                                data-i18n="nav.dash.ecommerce">Branch</a>
                        </li>

                        <li class="{{ current_route() == 'admin.sedrec.fetchSendRec' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.sedrec.fetchSendRec') }}"
                                data-i18n="nav.dash.ecommerce">Sender/Receiver</a>
                        </li>

                        <li class="{{ current_route() == 'admin.user.fetchUser' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.user.fetchUser') }}"
                                data-i18n="nav.dash.ecommerce">Users</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role_id === 2 || Auth::user()->role_id === 6)
                <li class="nav-item {{ current_route() == 'admin.user.fetchCustomer' ? 'active' : '' }}"><a
                        href="{{ route('admin.user.fetchCustomer') }}"><i class="la la-users"></i><span
                            class="menu-title" data-i18n="nav.dash.main">Customers</span></a>
                </li>
            @endif

            <li class="nav-item {{ current_route() == 'admin.order.fetchOrder' ? 'active' : '' }}"><a
                    href="{{ route('admin.order.fetchOrder') }}"><i class="la la-shopping-cart"></i><span class="menu-title"
                        data-i18n="nav.dash.main">Orders</span></a>
            </li>

            @if (Auth::user()->role_id === 2)
                <li class="nav-item {{ current_route() == 'admin.role.fetchRole' ? 'open' : '' }}">
                    <a href="#"><i class="la la-cog"></i><span class="menu-title"
                            data-i18n="nav.dash.main">Settings</span></a>
                    <ul class="menu-content">
                        <li class="{{ current_route() == 'admin.role.fetchRole' ? 'active' : '' }}"><a
                                class="menu-item" href="{{ route('admin.role.fetchRole') }}"
                                data-i18n="nav.dash.ecommerce">Role</a>
                        </li>

                    </ul>
                </li>
            @endif


        </ul>
    </div>
</div>
