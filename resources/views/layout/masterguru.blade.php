
<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>@yield ('judul')</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="/assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/media/favicons/apple-touch-icon-180x180.png">

        <script src="/assets/js/jquery-ui.custom/jquery-ui.js"></script>
        <script src="/assets/js/jquery-external.js"></script>

        
        <link rel="stylesheet" href="/assets/js/plugins/select2/css/select2.css">

        <link rel="stylesheet" href="/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
        <!-- END Icons -->

        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        
        <link rel="stylesheet" id="css-main" href="/assets/css/codebase.min.css">

        <link rel="stylesheet" href="/assets/js/plugins/datatables/dataTables.bootstrap4.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
      
    <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-glass">
           
            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                      
                        <!-- END Mini Mode -->

                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                

                            <!-- Logo -->
							<div class="content-header-item">
                                    <i class="si si-screen-desktop"></i>
                                    <span class="font-size-xl text-dual-primary-dark">Absensi</span><span class="font-size-xl text-danger">KGJ</span>
                                
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Side User -->
                    <div class="content-side content-side-full content-side-user px-10 align-parent">

                        <!-- Visible only in normal mode -->
                        <div class="sidebar-mini-hidden-b text-center">
                        <img class="img-avatar" src="{{ asset('fotoguru/'.Auth::user()->foto)}}" style = "height: 90px; width: 190px; border-radius:50%; margin-right:15px;" alt="">
                            </a>
                            <ul class="list-inline mt-10">
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="#">{{ \Auth::user()->namaguru }}</a>
                                
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END Visible only in normal mode -->
                    </div>
                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a href="/guru/index"><i class="fa fa-group"></i><span class="sidebar-mini-hide">DASHBOARD GURU</span></a>
                            </li>
							<li class="nav-main-heading"><span class="sidebar-mini-visible"></span><span class="sidebar-mini-hidden">MENU UTAMA</span></li>
							
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-graduation"></i><span class="sidebar-mini-hide">Nilai Siswa</span></a>
                                <ul>
                                    <li>
                                        <a href="/guru/inputnilaisiswa">Input Nilai Siswa</a>
                                    </li>
                                    <li>
                                        <a href="#">Lihat Nilai Siswa</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-book"></i><span class="sidebar-mini-hide">Absensi Siswa</span></a>
                                <ul>
                                    <li>
                                        <a href="/guru/verifikasiabsen">Verifikasi Absensi Siswa</a>
                                    </li>
                                    <li>
                                        <a href="/guru/daftarabsen">Lihat Absensi Siswa</a>
                                    </li>
									<li>
                                        <a href="#">Cetak Absensi Siswa</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-database"></i><span class="sidebar-mini-hide">Data Siswa</span></a>
                                <ul>
                                    <li>
                                        <a href="/guru/daftardatasiswa">Lihat Data Siswa</a>
                                    </li>
                                    <li>
                                    <a href="/guru/daftarakunsiswa">Lihat Akun Siswa</a>
                                    </li>
                                    <li>
                                        <a href="/guru/daftardatakelas">Lihat Data Kelas</a>
                                    </li>
									<li>
                                        <a href="#">Cetak Data Siswa</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Mading Online</span></a>
                                <ul>
                                    <li>
                                        <a href="/guru/informasiguru">Mading Guru</a>
                                    </li>
                                    <li>
                                    <a href="/guru/informasisiswa">Mading Siswa</a>
                                    </li>
                                </ul>
                            </li>
									<li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Data Guru</span></a>
                                <ul>
                                    <li>
                                        <a href="/guru/daftardataguru">Lihat Data Guru</a>
                                    </li>
                                    <li>
                                    <li>
                                        <a href="/guru/daftarwalikelas">Lihat Data Wali Kelas</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bar-chart"></i><span class="sidebar-mini-hide">Rekapitulasi </span></a>
                                <ul>
                                    <li>
                                        <a href="#">Absensi Siswa</a>
                                    </li>
                                    <li>
                                    <li>
                                        <a href="#">Nilai Siswa</a>
                                    </li>
                                    <li>
                                        <a href="#">Cetak Laporan Absensi</a>
                                    </li>
                                    <li>
                                        <a href="#">Cetak Laporan Nilai</a>
                                    </li>
                                </ul>
                            </li>


							<li>
							<a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span class="sidebar-mini-hide">Profile</span></a>
                                <ul>
                                    <li>
                                        <a href="/guru/profileguru">Lihat Profile</a>
                                    </li>
                                    <li>
                              
                                </ul>
                            </li> 
                            <li>
                            <a href="{{ route('guru.logout') }}"><i class="si si-logout"></i><span class="sidebar-mini-hide">Logout</span></a>
                            </li>
                                                             
										
                                  
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header-modern">
                <!-- Header Content -->
                <div class="content-header bg-warning">
                    <!-- Left Section -->
                    <div class="content content-full content-top">                     
                     
                     </div>
                        <!-- END Layout Options -->
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">{{ \Auth::user()->namaguru }}</span>
                                <i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">Guru</h5>
                                <a class="dropdown-item" href="/guru/profileguru">
                                    <i class="si si-user mr-5"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('guru.logout') }}">
                                 <i class="si si-logout"></i>  Logout</span>
                                </a>
                            </li>
                        </div>
                        
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

               
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

              @yield('konten')

            </main>

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                <div class="float-left">
                <?php
date_default_timezone_set('Asia/Jakarta');
                        echo '<h6>'.  'Tanggal : ' .date('d-m-Y').'</h6>' .'<h6>';
                        echo 'Jam : ' .date('H:i:s').'</h4>';
?>
</div>
                            <div class="float-right">
                        <a class="font-w600">Teacher TKJ KGJ</a> &copy; <span class="js-year-copy">2020  </span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
      
        <script src="/assets/js/codebase.core.min.js"></script>

       
        <script src="/assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="/assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/be_pages_dashboard.min.js"></script>
        <!-- Page JS Plugins -->

        <script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        
        <script src="/assets/js/pages/be_forms_validation.min.js"></script>
        <script src="/assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
     <!-- Page JS Plugins -->

     <script src="/assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="/assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="/assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
        <script src="/assets/js/plugins/flot/jquery.flot.min.js"></script>
        <script src="/assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="/assets/js/plugins/flot/jquery.flot.stack.min.js"></script>
        <script src="/assets/js/plugins/flot/jquery.flot.resize.min.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/be_comp_charts.min.js"></script>

        <!-- Page JS Helpers (Easy Pie Chart Plugin) -->
        <script>jQuery(function(){ Codebase.helpers('easy-pie-chart'); });</script>


        <script src="/assets/js/pages/be_ui_icons.min.js"></script>
        <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
        <script>jQuery(function(){ Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });</script>
        
 <!-- Page JS Helpers (Select2 plugin) -->
 <script>jQuery(function(){ Codebase.helpers('select2'); });</script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/be_tables_datatables.min.js"></script>
        <script>jQuery(function () {
                                    Codebase.helpers('table-tools');
                                });</script>
    </body>
</html>