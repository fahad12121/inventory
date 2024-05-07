      <!-- BEGIN: Navbar-->
      <!-- Navbar -->
      <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">

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
                      <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                          href="javascript:void(0);" data-bs-toggle="dropdown">
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
                      <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                          href="javascript:void(0);" data-bs-toggle="dropdown">
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

                  <!-- Notification -->
                  <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
                      <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                          href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                          aria-expanded="false">
                          <i class="mdi mdi-bell-outline mdi-24px"></i>
                          <span
                              class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end py-0">


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
                      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                          data-bs-toggle="dropdown">
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
                                              <img src="../../demo/assets/img/avatars/1.png" alt
                                                  class="w-px-40 h-auto rounded-circle">
                                          </div>
                                      </div>
                                      <div class="flex-grow-1">
                                          <span class="fw-medium d-block">
                                            {{ Auth::user()->name }}
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
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                  <i class='mdi mdi-login me-2'></i>
                                  <span class="align-middle">Logout</span>
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </li>
                      </ul>
                  </li>
                  <!--/ User -->
              </ul>
          </div>

          <!-- Search Small Screens -->
          <div class="navbar-search-wrapper search-input-wrapper  d-none">
              <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
                  aria-label="Search...">
              <i class="mdi mdi-close search-toggler cursor-pointer"></i>
          </div>
      </nav>
