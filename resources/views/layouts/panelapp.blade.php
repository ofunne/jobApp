<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">
    @if (Auth::user()->type == 1)
        <link href="{{ asset('backend/css/admin.css') }}" rel="stylesheet">                  
    @elseif (Auth::user()->type == 2)
        <link href="{{ asset('backend/css/client.css') }}" rel="stylesheet">               
    @else 
        <link href="{{ asset('backend/css/user.css') }}" rel="stylesheet">          
    @endif
    
    @yield('css')

    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/nprogress.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    

</head>


<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>{{ config('app.name', ' BlogApp') }}</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            @if (Auth::user()->type == 1)
                                <img src="{{ asset('backend/images/user.png') }}" alt="..." class="img-circle profile_img">
                            @elseif (Auth::user()->type == 2)
                                @if (Auth::user()->logo == null)
                                    <img src="{{ asset('backend/images/user.png') }}" alt="..." class="img-circle profile_img">
                                @else
                                    <img src="/storage/company_logos/{{Auth::user()->logo}}" alt="..." class="img-circle profile_img">
                                @endif
                                    
                            @else 
                                <img src="{{ asset('backend/images/user.png') }}" alt="..." class="img-circle profile_img">  
                            @endif                        
                        </div>
                        <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                @if (Auth::user()->type == 1)
                                    <li>
                                        <a href=" {{route('admin.dashboard')}} "><i class="fa fa-dashboard"></i> Dashboard </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-dashboard"></i> Clients </a>
                                    </li>
                                @elseif (Auth::user()->type == 2)
                                    <li>
                                        <a href=" {{route('client.dashboard')}} "><i class="fa fa-dashboard"></i> Dashboard </a>
                                        
                                    </li>
                                    <li>
                                        <a href=" {{route('profile.index')}} "><i class="fa fa-suitcase"></i> Profile </a>
                                    </li>
                                    <li>
                                        <a href=" {{route('jobs.index')}}"><i class="fa fa-tasks"></i> Jobs </a>
                                    </li>
                                    <li>
                                        <a href="/client/applications"><i class="fa fa-tasks"></i> Applications </a>
                                    </li>
                                @else 
                                    <li>
                                        <a href=" {{route('home')}} "><i class="fa fa-dashboard"></i> Dashboard </a>
                                    </li>
                                    <li>
                                        <a href="/user/profile"><i class="fa fa-suitcase"></i> Profile </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                @if (Auth::user()->type == 1)
                                    <img src="{{ asset('backend/images/user.png') }}" alt="">{{ Auth::user()->name }}
                                @elseif (Auth::user()->type == 2)
                                    @if (Auth::user()->logo == null)
                                        <img src="{{ asset('backend/images/user.png') }}" alt="">{{ Auth::user()->name }}
                                    @else
                                        <img src="/storage/company_logos/{{Auth::user()->logo}}" alt="">{{ Auth::user()->name }}
                                    @endif
                                        
                                @else 
                                    <img src="{{ asset('backend/images/user.png') }}" alt="">{{ Auth::user()->name }}
                                @endif      
                                <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green"></span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                
                                </ul>
                            </li>

                            </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="page-title">
                  <div class="title_left">
                    <h3>@yield('page_title')</h3>
                  </div>
      
                  <div class="title_right">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
                      @include('inc.messages')
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>

                @yield('content')
                
                <!-- footer content -->
                
                <footer>
                    <div class="copyright-info">
                        <p class="pull-right">{{ config('app.name', ' BlogApp') }}</a>  
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->
        </div>
    </div>

    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('backend/js/custom.js') }}"></script>

    @yield('script')

    <!-- /footer content -->
</body>

</html>
