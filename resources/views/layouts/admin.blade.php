<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/logosmp.png') }}" rel="icon" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-purple sidebar sidebar-dark accordion" id="accordionSidebar">


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/logosmp.png') }}" alt="Logo" style="width:60px; height:60px;">
                </div>
                <div class="sidebar-brand-text mx-3">SMP Negeri 22 <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- ================= PROFIL ================= -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfil"
                    aria-expanded="true" aria-controls="collapseProfil">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>
                <div id="collapseProfil" class="collapse" aria-labelledby="headingProfil"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->routeIs('school.show') ? 'active' : '' }}"
                            href="{{ route('school.show') }}">Tentang</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- ================= MASTER DATA ================= -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
                    aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->routeIs('school.edit') ? 'active' : '' }}"
                            href="{{ route('school.edit') }}">Data Sekolah</a>

                        <a class="collapse-item {{ request()->routeIs('students.index') ? 'active' : '' }}"
                            href="{{ route('students.index') }}">Murid</a>

                        <a class="collapse-item {{ request()->routeIs('teachers.index') ? 'active' : '' }}"
                            href="{{ route('teachers.index') }}">Guru</a>

                        <a class="collapse-item {{ request()->routeIs('classes.index') ? 'active' : '' }}"
                            href="{{ route('classes.index') }}">Kelas</a>

                        <a class="collapse-item {{ request()->routeIs('subjects.index') ? 'active' : '' }}"
                            href="{{ route('subjects.index') }}">Mata Pelajaran</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- ================= AKADEMIK ================= -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik"
                    aria-expanded="true" aria-controls="collapseAkademik">
                    <i class="fas fa-fw fa-school"></i>
                    <span>Akademik</span>
                </a>
                <div id="collapseAkademik" class="collapse" aria-labelledby="headingAkademik"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->routeIs('schedules.index') ? 'active' : '' }}"
                            href="{{ route('schedules.index') }}">Jadwal</a>

                        <a class="collapse-item {{ request()->routeIs('extracurriculars.index') ? 'active' : '' }}"
                            href="{{ route('extracurriculars.index') }}">Extrakurikuler</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- ================= INFORMASI PUBLIK ================= -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInformasi"
                    aria-expanded="true" aria-controls="collapseInformasi">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Informasi Publik</span>
                </a>
                <div id="collapseInformasi" class="collapse" aria-labelledby="headingInformasi"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item {{ request()->routeIs('news.index') ? 'active' : '' }}"
                            href="{{ route('news.index') }}">Berita</a>

                        <a class="collapse-item {{ request()->routeIs('announcements.index') ? 'active' : '' }}"
                            href="{{ route('announcements.index') }}">Pengumuman</a>

                        <a class="collapse-item {{ request()->routeIs('achievements.index') ? 'active' : '' }}"
                            href="{{ route('achievements.index') }}">Penghargaan</a>

                        <a class="collapse-item {{ request()->routeIs('gallery.index') ? 'active' : '' }}"
                            href="{{ route('gallery.index') }}">Galeri</a>

                        <a class="collapse-item {{ request()->routeIs('events.index') ? 'active' : '' }}"
                            href="{{ route('events.index') }}">Event</a>

                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <figure class="img-profile rounded-circle avatar font-weight-bold"
                                    data-initial="{{ Auth::user()->name[0] }}"></figure>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Profile') }}
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('main-content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Kelompok 4 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <!-- FULLCALENDAR GLOBAL -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>



    @yield('scripts')
</body>

</body>

</html>
