<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Quản lý website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <!-- third party css -->
    <link href="{{asset('css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/app-creative.css')}}" rel="stylesheet" type="text/css" id="light-style" />


</head>

<body class="loading" data-layout="topnav"
    data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
    <div class="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="navbar-custom topnav-navbar topnav-navbar-dark">
                    <div class="container-fluid">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="dropdown notification-list topbar-dropdown d-none d-lg-block">
                                <a class="nav-link dropdown-toggle arrow-none" id="topbar-languagedrop" href="{{route('user.index')}}"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="dripicons-user"></i>
                                    <span class="align-middle">Danh sách sinh viên</span>
                                </a>
                            </li>
                
                            <li class="dropdown notification-list topbar-dropdown d-none d-lg-block">
                                <a class="nav-link dropdown-toggle arrow-none" id="topbar-languagedrop" href="{{route('web.index')}}"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="dripicons-document-edit"></i>
                                    <span class="align-middle">Danh sách website</span>
                                </a>
                            </li>
                
                            <li class="dropdown notification-list d-none d-sm-inline-block">
                                <a class="nav-link dropdown-toggle nav-user arrow-none" data-toggle="dropdown" id="topbar-userdrop"
                                    href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{asset('images/users/avatar.png')}}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        
                                        <span class="account-user-name">{{session('user')->name}}</span>
                                        <span class="account-position">Intern</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                                    aria-labelledby="topbar-userdrop">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome!</h6>
                                    </div>
                
                                    <!-- item-->
                                    <a href="{{route('user.show',session('user')->_id)}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span>My Account</span>
                                    </a>
                                    <a href="{{route('user.edit',session('user')->_id)}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit mr-1"></i>
                                        <span>Account Setting</span>
                                    </a>
                                    <!-- item-->
                                    <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout mr-1"></i>
                                        <span>Logout</span>
                                    </a>
                
                                </div>
                            </li>
                
                        </ul>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="{{asset('js/vendor.min.js')}}"></script>
    <script src="{{asset('js/app.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{asset('js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/vendor/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/vendor/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/vendor/dataTables.checkboxes.min.js')}}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{asset('js/pages/demo.customers.js')}}"></script>

</body>

</html>