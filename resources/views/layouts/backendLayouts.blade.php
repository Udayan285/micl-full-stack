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
                    <a href="{{ route('dashboard.all') }}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('dashboard.heroBanner') }}" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Hero Banner</a>
                   
                    {{-- corporate-menu --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Corporate Vision</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.corporate') }}" class="dropdown-item">Home Corporate</a>
                            <a href="{{ route('dashboard.mainCorporate') }}" class="dropdown-item">Main Corporate</a>
                            
                        </div>
                    </div>

                    {{-- about-us-menu --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>About Us</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.homeAbout') }}" class="dropdown-item">Home About</a>
                            <a href="{{ route('dashboard.actualAbout') }}" class="dropdown-item">Main About</a>
                            
                        </div>
                    </div>

                    <a href="{{ route("auth.logout") }}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Logout</a>

                    
                   
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

    <!-- Template Javascript -->
    <script src="{{ asset('backend/js/main.js') }}"></script>
</body>

</html>