        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2 js-right-sidebar ">
            <div class="logo d-flex justify-content-center align-items-center">
                <a href="/admin">
                    <img src="{{ asset('admin-assets/images/icon/logo-white.png') }}" alt="MDCH Admin" width="150px" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1 d-flex flex-column justify-content-between">
                <!-- <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{ asset('admin-assets/images/icon/avatar-big-01.jpg') }}" alt="John Doe" />
                    </div>
                    <h4 class="name">john doe</h4>
                    <a href="/admin/logout">Sign out</a>
                </div> -->
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard-active')">
                            <a class="js-arrow" href="/admin/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <!-- <li>
                            <a href="inbox.html">
                                <i class="fas fa-chart-bar"></i>Inbox</a>
                            <span class="inbox-num">3</span>
                        </li> -->
                        <!-- <li>
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>eCommerce</a>
                            </li> -->
                        <li class="has-sub @yield('contents-active')">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Contents
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="@yield('news-active')">
                                    <a href="/admin/news">
                                        <i class="fas fa-newspaper"></i>News</a>
                                </li>

                                <li class="has-sub @yield('about-active')">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-circle-info"></i>About
                                        <span class="arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </span>
                                    </a>
                                    <ul class="list-unstyled js-sub-list">
                                        <li class="@yield('about-sub-active')">
                                            <a href="{{ route('admin.section_key', 'about') }}">
                                                About</a>
                                        </li>
                                        <li class="@yield('facilities-active')">
                                            <a href="{{ route('admin.section_key', 'facilities') }}">
                                                Our Facilities</a>
                                        </li>
                                        <li class="@yield('administrations-active')">
                                            <a href="/admin/administrations">
                                                Administrations</a>
                                        </li>
                                        <li class="@yield('office-stuff-active')">
                                            <a href="{{ route('admin.section_key', 'office-stuff') }}">
                                                Office Stuff</a>
                                        </li>
                                        <li class="@yield('affiliation-active')">
                                            <a href="{{ route('admin.section_key', 'affiliation') }}">
                                                Affiliation</a>
                                        </li>
                                        <li class="@yield('messages-active')">
                                            <a href="{{ route('admin.section_key', 'messages') }}">
                                                Messages</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@yield('bds-course-active')">
                                    <a href="{{ route('admin.section_key', 'bds-course') }}">
                                        <i class="fas fa-rectangle-list"></i>BDS Course</a>
                                </li>
                                <li class="@yield('departments-active')">
                                    <a href="/admin/departments">
                                        <i class="fas fa-building"></i>Departments</a>
                                </li>
                                <li class="@yield('faqs-active')">
                                    <a href="/admin/faqs">
                                        <i class="fas fa-file-circle-question"></i>FAQs</a>
                                </li>
                                <!-- <li>
                                    <a href="/admin/image_box">
                                        <i class="fas fa-image"></i>Image Box</a>
                                </li> -->

                                <li class="@yield('advertisements-active')">
                                    <a href="/admin/advertisements">
                                        <i class="fas fa-rectangle-ad"></i>Ads</a>
                                </li>
                                <li class="@yield('albums-active')">
                                    <a href="/admin/albums">
                                        <i class="fas fa-images"></i>Photo Album</a>
                                </li>
                                <li class="@yield('admission-active')">
                                    <a href="/admin/admission">
                                        <i class="fas fa-graduation-cap"></i>Admission</a>
                                </li>
                                <!-- <li>
                                    <a href="/admin/opd">
                                        <i class="fas fa-hospital-user"></i>OPD</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user-doctor"></i>Teachers</a>
                            </a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user-graduate"></i>Students</a>
                            </a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Account</a>
                            </a>
                        </li> -->
                        <li>
                        </li>
                        <li class="has-sub @yield('setting-active')">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-settings"></i>Setting
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="@yield('informations-active')">
                                    <a href="/admin/settings/informations"></i>Informations</a>
                                </li>
                                <li class="@yield('change-password-active')">
                                    <a href="/admin/settings/change-password"></i>Change Password</a>
                                </li>
                                <li class="@yield('change-email-active')">
                                    <a href="/admin/settings/change-email"></i>Change Email Address</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">
                                        <i class="fas fa-sign-in-alt"></i>Login</a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">
                                        <i class="fab fa-flickr"></i>Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">
                                        <i class="fas fa-comment-alt"></i>Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">
                                        <i class="far fa-window-maximize"></i>Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">
                                        <i class="far fa-id-card"></i>Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">
                                        <i class="far fa-bell"></i>Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">
                                        <i class="fas fa-tasks"></i>Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">
                                        <i class="far fa-window-restore"></i>Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">
                                        <i class="fas fa-toggle-on"></i>Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">
                                        <i class="fas fa-th-large"></i>Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">
                                        <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                </li>
                                <li>
                                    <a href="typo.html">
                                        <i class="fas fa-font"></i>Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>

                <div class="p-2">
                    <a class="btn btn-danger w-100" href="/admin/logout"><i class="fas fa-power-off"></i> Sign out</a>
                </div>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->




        <!-- PAGE CONTAINER-->
        <div class="page-container2 d-flex flex-column h-100">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none py-3">
                                <a href="/admin">
                                    <img src="{{ asset('admin-assets/images/icon/logo-white.png') }}" alt="MDCH Admin" width="150px" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <!-- <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div> -->
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-lg-none header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->