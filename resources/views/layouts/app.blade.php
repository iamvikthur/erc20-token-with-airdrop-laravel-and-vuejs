<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> NGL - @yield('title') </title>
    <link rel="icon" type="image/x-icon" href="{{asset('dash/assets/img/favicon.ico')}}"/>
    <link href="{{asset('dash/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('dash/assets/js/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset('dash/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dash/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dash/assets/css/structure.css')}}" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('dash/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dash/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" class="dashboard-analytics" />
    <link rel="stylesheet" type="text/css" href="{{asset('dash/assets/css/widgets/modules-widgets.css')}}">  
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->



    @yield('styles')

</head>
<body class="dashboard-analytics admin-header">
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
    <div id="app">
        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

            {{-- !!! SIDEBAR COMPONENT HERE !!! --}}
            <sidebar-left-component></sidebar-left-component>
            
            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    
                    <div class="content-container">

                        <div class="col-left layout-top-spacing">
                            <div class="col-left-content">

                                <div class="header-container">
                                    <header class="header navbar navbar-expand-sm">                                    
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                                                <div class="bt-menu-trigger">
                                                    <span></span>
                                                </div>
                                            </a>
                                            <div class="page-header">
                                                <div class="page-title">
                                                    <h3>Dashboard</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="header-actions">
                                            <div class="nav-item d-none d-sm-none d-md-block">
                                                <a class="font-weight-bolder" href="#" role="button">
                                                    {{-- <span>Referred By: 0x04...8184</span>  --}}
                                                </a>
                                            </div>

                                            <div class="toggle-notification-bar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                </svg>
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg> --}}
                                            </div>
                                        </div>
                                    </header>
                                </div>

                                @yield('content')

                                <div class="footer-wrapper col-xl-12">
                                    <div class="footer-section f-section-1">
                                        <p class="">&copy; 2022 <a href="#">NGL Token</a></p>
                                    </div>
                                    <div class="footer-section f-section-2">
                                        <p class="">Walk to earn <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- !!! SIDEBAR RIGHT !!!  --}}
                        <sidebar-right-component></sidebar-right-component>

                    </div>
                </div>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('dash/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('dash/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('dash/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dash/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dash/assets/js/custome_app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('dash/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    {{-- <script src="{{asset('dash/plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('dash/assets/js/dashboard/dash_1.js')}}"></script>
    <script src="{{asset('dash/assets/js/widgets/modules-widgets.js')}}"></script> --}}
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    @yield('script')

    {{-- vue js  --}}
    {{-- @vite('resources/js/app.js') --}}
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>