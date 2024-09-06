<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard - MICL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('auth/dist/images/micl-logo2.png') }}" rel="shortcut icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
     {{-- summernote link --}}
     {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('backend/img/udayan.png') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user() ? auth()->user()->first_name : "Udayan Singh" }}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard.all') }}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('dashboard.heroBanner') }}" class="nav-item nav-link {{ request()->is('dashboard/hero-banner') ? 'active' : '' }}"><i class="fas fa-home"></i>Hero Banner</a>
                   
                    {{-- corporate-menu --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('dashboard/corporate-vision','dashboard/main-corporate-vision') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-business-time"></i>Corporate Vision</a>
                        <div class="dropdown-menu bg-transparent border-0 ">
                            <a href="{{ route('dashboard.corporate') }}" class="dropdown-item {{ request()->is('dashboard/corporate-vision') ? 'active' : '' }}">Home Corporate</a>
                            <a href="{{ route('dashboard.mainCorporate') }}" class="dropdown-item {{ request()->is('dashboard/main-corporate-vision') ? 'active' : '' }}">Main Corporate</a>
                            
                        </div>
                    </div>

                    {{-- about-us-menu --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('dashboard/home-about','dashboard/actual-about-us') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="far fa-address-card"></i>About Us</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.homeAbout') }}" class="dropdown-item {{ request()->is('dashboard/home-about') ? 'active' : '' }}">Home About</a>
                            <a href="{{ route('dashboard.actualAbout') }}" class="dropdown-item {{ request()->is('dashboard/actual-about-us') ? 'active' : '' }}">Main About</a>
                            
                        </div>
                    </div>

                    {{-- Business-Activities-menu --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('dashboard/storage-tank-terminal-and-delivery-support-services','dashboard/bitumen-plant-and-storage-tank','dashboard/physical-refinery','dashboard/super-oil-dry-fractionation','dashboard/edible-oil','dashboard/bottle-making','dashboard/business-activities/preview','dashboard/bitumen-plant/preview','dashboard/physical-refienry/preview','dashboard/bottle-making/preview') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fas fa-chart-line"></i>Business Act.</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.storageTank') }}" class="dropdown-item {{ request()->is('dashboard/storage-tank-terminal-and-delivery-support-services','dashboard/business-activities/preview') ? 'active' : '' }}">Storage tank terminal</a>
                            <a href="{{ route('dashboard.bitumen') }}" class="dropdown-item {{ request()->is('dashboard/bitumen-plant-and-storage-tank','dashboard/bitumen-plant/preview') ? 'active' : '' }}">Bitumen plant</a>
                            <a href="{{ route('dashboard.physical') }}" class="dropdown-item {{ request()->is('dashboard/physical-refinery','dashboard/physical-refienry/preview') ? 'active' : '' }}">Physical refienery</a>
                            <a href="{{ route('dashboard.superOil') }}" class="dropdown-item {{ request()->is('dashboard/super-oil-dry-fractionation') ? 'active' : '' }}">Super oil and dry fractionation</a>
                            <a href="{{ route('dashboard.edibleOil') }}" class="dropdown-item {{ request()->is('dashboard/edible-oil') ? 'active' : '' }}">Edible oil</a>
                            <a href="{{ route('dashboard.bottleMaking') }}" class="dropdown-item {{ request()->is('dashboard/bottle-making','dashboard/bottle-making/preview') ? 'active' : '' }}">Bottle making</a>                           
                        </div>
                    </div>

                    <a href="{{ route('dashboard.area') }}" class="nav-item nav-link {{ request()->is('dashboard/area') ? 'active' : '' }}"><i class="fas fa-street-view"></i>Area</a>
                    <a href="{{ route('dashboard.contactPage') }}" class="nav-item nav-link {{ request()->is('dashboard/contact-page') ? 'active' : '' }}"><i class="fas fa-address-book"></i>Contact Us</a>
                    <a href="{{ route('dashboard.mdPage') }}" class="nav-item nav-link {{ request()->is('dashboard/md-profile') ? 'active' : '' }}"><i class="fas fa-user"></i>Manager</a>
                    <a href="{{ route('dashboard.footer') }}" class="nav-item nav-link {{ request()->is('dashboard/footer') ? 'active' : '' }}"><i class="fas fa-hourglass-end"></i>Footer</a>
                    <a href="{{ route("auth.logout") }}" class="nav-item nav-link "><i class="fas fa-sign-out-alt"></i>Logout</a>

                    
                   
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
         

        @yield('backendLayoutsPart')


        
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    {{-- custom js --}}
    @stack('imgviewmaincorporate')
    @stack('imgviewbanner')
    @stack('imgviewhomecorporate')
    @stack('homeAboutImage')
    {{-- @stack('ckeditorMainCorporate') --}}

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('backend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('backend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{-- summernote js --}}
            {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
            <script>
                $(document).ready(function() {
                $('#summernote').summernote(
                    {height:200,}
                );
                });
            </script>

            <script>
                $(document).ready(function() {
                $('.summernote').summernote(
                    {height:200,}
                );
                });
            </script>
    <!-- Template Javascript -->
    <script src="{{ asset('backend/js/main.js') }}"></script>
</body>

</html>