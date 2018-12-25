<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/') }}admin/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/') }}admin/dashboard/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/') }}admin/dashboard/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="{{ asset('/') }}admin/dashboard/dist/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('/') }}admin/dashboard/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('/') }}admin/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style>
    .notification {
      color: #23527C;
      text-decoration: none;
      position: relative;
      display: inline-block;
    }

    .notification:hover {
      background: red;
    }

    .notification .badge {
      position: absolute;
      top: 2px;
      right: -3px;
      padding: 5px 8px;
      border-radius: 50%;
      background-color: red;
      color: white;
    }
</style>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('/admin.home') }}">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{ route('new_orders') }}" class="notification">
                      <span>New Order</span>
                      <span class="badge">{{ $ordersCount }}</span>
                    </a>
                </li>                
                <li>
                    <a href="#" class="notification">
                      <span>Message</span>
                      <span class="badge">0</span>
                    </a>
                </li>
                 <li class="dropdown">
                     <a data-toggle="dropdown" href="#" id="navbarDropdown" class="dropdown-toggle nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }}</span>
                     <i class="fa fa-caret-down"></i>
                     </a>   
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>
                         <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                         @csrf
                         <input type="hidden" name="logout" value="admin">
                         </form>
                     </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ route('/admin.home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-star"></span> Catagory<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('/cat_list') }}"><span class="glyphicon glyphicon-list"></span> Catagory List</a>
                                </li>
                                <li>
                                    <a href="{{ route('/addCatagory') }}"><span class="glyphicon glyphicon-plus"></span> Catagory Add</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                       
                         <li>
                            <a href="#"><span class="glyphicon glyphicon-star"></span> Brand<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('/brand-list') }}"><span class="glyphicon glyphicon-list"></span> Brand List</a>
                                </li>
                                <li>
                                    <a href="{{ route('/add-brand') }}"><span class="glyphicon glyphicon-plus"></span> Brand Add</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                       
                          <li>
                            <a href="#"><span class="glyphicon glyphicon-star"></span> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href='{{ route("/product_list") }}'><span class="glyphicon glyphicon-list"></span> Product List</a>
                                </li>
                                <li>
                                    <a href="{{ route("/add_product") }}"><span class="glyphicon glyphicon-plus"></span> Product Add</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                  
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-star"></span> Advertisement Manager<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                             <li>
                                <a href='{{ route("/advertisement_list") }}'><span class="glyphicon glyphicon-list"></span> Advertisement List</a>
                              </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('headline') </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @yield("body")
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/') }}admin/dashboard/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/') }}admin/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/') }}admin/dashboard/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('/') }}admin/dashboard/vendor/raphael/raphael.min.js"></script>
    <script src="{{ asset('/') }}admin/dashboard/vendor/morrisjs/morris.min.js"></script>
    <script src="{{ asset('/') }}admin/dashboard/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/') }}admin/dashboard/dist/js/sb-admin-2.js"></script>
    <script src="{{ asset('/') }}admin/dashboard/dist/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}admin/dashboard/dist/js/bootbox.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
    <script src="{{ asset('/') }}admin/dashboard/dist/js/custom-jquery.js"></script>
    <script src="{{ asset('/') }}admin/dashboard/dist/js/custom-js.js"></script>
</body>
</html>
