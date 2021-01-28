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
                        <a href="/defaultUser" class="site_title"><img src="{{asset ('assets/images/logo.png')}}"
                                style="width:50px"> <span style="font-size:70%">SMA Kolese De Britto</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{Asset ('uploads/avatars/'. Session::get('avatar') ) }}" alt="..."
                                class="img-circle profile_img">
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
                                        <li><a href="/defaultUser">Daftar Kategori</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Upload <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/formupload">Form Upload Video</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Media <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/gallery">Video Gallery</a></li>
                                    </ul>
                                </li>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
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
                                    {{ Session::get('name')}}</a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile"> Profile</a>
                                    <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Form Upload Video</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Video Uploader</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <h6>Pilih Kategori lalu Masukan Judul Video dan Deskripsi Video, Setelah itu
                                        pilih File Video Anda dan juga pilih Thumbnail Anda.</h6>
                                    <br>
                                    <form action="{{url ('/upload/proses') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <label for="mapel">Daftar Kategori:</label>
                                        <select name="mapel" id="mapel">

                                            <option value="" selected disabled hidden>Pilih Kategori</option>
                                            @foreach($mapel as $mata)
                                            <option value="{{$mata->namamatapelajaran}}">{{$mata->namamatapelajaran}}
                                            </option>
                                            @endforeach
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
                                    @if(\Session::has('alert-title'))
                                    <div class="alert alert-danger">
                                        <div>
                                            <h2 style="text-align:center;">{{Session::get('alert-title')}}</h2>
                                        </div>
                                    </div>
                                    @endif

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
                    SMA Kolese De Britto Yogyakarta</a>
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