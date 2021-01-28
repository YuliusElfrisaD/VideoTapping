<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset ('assets/images/logo.png')}}" type="image" />
    <title>SMA Kolese De Britto Yogyakarta</title>

    <!-- Bootstrap -->
    <link href="{{asset ('assets/vendors/bootstrap/dist/css/bootstrap.min.cs') }}s" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset ('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset ('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{asset ('assets/vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset ('assets/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/home" class="site_title"><img src="{{asset ('assets/images/logo.png')}}"
                                style="width:50px"> <span style="font-size:70%">SMA Kolese De Britto</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{asset ('assets/images/gmb1.jpg')}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Selamat Datang,</span>
                            <h2>{{Session::get('name')}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/defaultadmin">Mata Pelajaran</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Upload <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/uploadadmin">Form Upload Video</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Media <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/galleryadmin">Video Gallery</a></li>
                                        <li><a href="/edit">Admin Page</a></li>
                                    </ul>
                                </li>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="/">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt="">{{Session::get('name')}}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profileadmin"> Profile</a>
                                    <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out pull-right"></i>
                                        Log
                                        Out</a>
                                </div>
                            </li>

                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Form Upload </h3>
                        </div>
                        <!--<div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>-->
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Dropzone multiple file uploader</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p>Drag files video ke box dibawah atau pilih file video. Setelah itu pilih mata
                                        pelajaran.</p>


                                    <form action="/upload/proses" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <label for="mapel">Mata Pelajaran:</label>
                                        <select name="mapel" id="mapel">
                                            <option value="agama">Agama</option>
                                            <option value="antropologi">Antropologi</option>
                                            <option value="indonesia">Bahasa Indonesia</option>
                                            <option value="inggris">Bahasa Inggris</option>
                                            <option value="bk">Bimbingan Konseling</option>
                                            <option value="ekonomi">Ekonomi</option>
                                            <option value="fisika">Fisika</option>
                                            <option value="geografi">Geografi</option>
                                            <option value="jerman">Jerman</option>
                                            <option value="kimia">Kimia</option>
                                            <option value="mandarin">Mandarin</option>
                                            <option value="matematika">Matematika</option>
                                        </select>
                                        <br><br>

                                        <b>Judul Video</b><br>
                                        <div>
                                            <input type="text" class="form-control" id="title" name="title" />
                                        </div><br><br>
                                        <b>Deskripsi Video</b><br>
                                        <div>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" />
                                        </div><br><br>

                                        <div class="form-group">
                                            <b>File Video</b><br />
                                            <input type="file" name="input_video" accept="video/*">
                                        </div><br>
                                        <div>
                                            <b>Thumbnail Video<b><br>
                                                    <input type="file" name="thumbnail" accept="image/*">
                                        </div><br><br>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>

                                    <!--<form action="/upload/proses" class="dropzone" name="video" id="video" method="POST">
                            <label for="mapel">Mata Pelajaran:</label>
                      <select name="mapel" id="mapel">
                        <option value="agama">Agama</option>
                        <option value="antropologi">Antropologi</option>
                        <option value="indonesia">Bahasa Indonesia</option>
                        <option value="inggris">Bahasa Inggris</option>
                        <option value="bk">Bimbingan Konseling</option>
                        <option value="ekonomi">Ekonomi</option>
                        <option value="fisika">Fisika</option>
                        <option value="geografi">Geografi</option>
                        <option value="jerman">Jerman</option>
                        <option value="kimia">Kimia</option>
                        <option value="mandarin">Mandarin</option>
                        <option value="matematika">Matematika</option>
                      </select>
                      <br><br> 
                    <a class="btn btn-success" style="margin-left: 50%" href="/gallery"><i class="fa fa-edit m-right-xs"></i>Upload</a>
                    </form>-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    SMA Kolese DeBritto Yogyakarta</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset ('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{asset ('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{asset ('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{asset ('assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Dropzone.js -->
    <script src="{{asset ('assets/vendors/dropzone/dist/min/dropzone.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset ('assets/js/custom.min.js') }}"></script>
</body>

</html>