<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jan 2022 03:27:50 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard | TheNFTDoor </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />

    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/fixedHeader.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/fixedColumns.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />


</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

        <!-- LOGO -->
        <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <h3 class="text-white">NFTDoor</h3>
{{--                        <img src="assets/images/logo.png" alt="" height="16">--}}
                    </span>
            <span class="logo-sm">
                  <h3 class="text-white">NFTDoor</h3>
{{--                        <img src="assets/images/logo_sm.png" alt="" height="16">--}}

            </span>
        </a>

        <!-- LOGO -->
        <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
            <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a href="" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboards </span>
                    </a>

                </li>

                <li class="side-nav-title side-nav-item">Apps</li>



                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarArticles" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                        <i class="uil-pen"></i>
                        <span> Articles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarArticles">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('admin.article.create') }}">Add</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.article.index') }}">All Articles</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                        <i class="uil-archive-alt"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('admin.category.create') }}">Add</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.index') }}">All Categories</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarNFT" aria-expanded="false" aria-controls="sidebarNFT" class="side-nav-link">
                        <i class="uil-glass-martini-alt"></i>
                        <span> NFT Listing </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarNFT">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('admin.nft.create') }}">Add</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.nft.index') }}">All NFT</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarNFTGiveaway" aria-expanded="false" aria-controls="sidebarNFTGiveaway" class="side-nav-link">
                        <i class="uil-crockery"></i>
                        <span> NFT Giveaway </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarNFTGiveaway">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('admin.nft-giveaway.create') }}">Add</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.nft-giveaway.index') }}">All NFT Giveaway</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarToolbox" aria-expanded="false" aria-controls="sidebarToolbox" class="side-nav-link">
                        <i class="uil-paint-tool"></i>
                        <span> ToolBox </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarToolbox">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="{{ route('admin.toolbox.create') }}">Add</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.toolbox.index') }}">List</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a href="{{ route('admin.users') }}" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span> Users </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{ route('admin.setting') }}" class="side-nav-link">
                        <i class="uil-paint-tool"></i>
                        <span> Settings </span>
                    </a>
                </li>


            </ul>


            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-menu float-end mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                           aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                                    </span>
                            <span>
                                        <span class="account-user-name">{{ auth()->user()->name }}</span>
                                        <span class="account-position">Admin</span>
                                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->

                            <!-- item-->

                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <i class="mdi mdi-logout me-1"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
            </div>
            <!-- end Topbar -->
   @yield('content')

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- third party js -->
<script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>
<!-- end demo js-->


<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/fixedColumns.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/fixedHeader.bootstrap5.min.js') }}"></script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
</body>
</html>
