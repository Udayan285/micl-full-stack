
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEB - Industries</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('auth/dist/images/micl-logo2.png') }}" rel="shortcut icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    

   


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="frontend/lib/animate/animate.min.css" rel="stylesheet">
    <link href="frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="frontend/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="{{ route('micl.home') }}" class="navbar-brand">
                <h1 class="m-0 text-primary meb-logo"><img src="frontend/img/MEB/MEBLogo/Untitled-2.png" alt=""></h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('micl.home') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('micl.manager') }}" class="nav-item nav-link {{ request()->is('manager-profile') ? 'active' : '' }}">MD Profile</a>
                    <a href="{{ route('micl.aboutUs') }}" class="nav-item nav-link {{ request()->is('about-us-front') ? 'active' : '' }}">About Us</a>
                    <a href="{{ route('micl.corporate') }}" class="nav-item nav-link {{ request()->is('corporate-vision') ? 'active' : '' }}">Corporate Vision</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ request()->is('storage-tank-terminal','bitumen-plant','physical-refinery','super-oil-dry-fractionation','edible-oil','bottle-making') ? 'active' : '' }}" data-bs-toggle="dropdown">Business activities</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="{{ route('micl.storageTank') }}" class="dropdown-item {{ request()->is('storage-tank-terminal') ? 'active' : '' }}">Storage Tank Terminal & Delivery Support Services </a>
                            <a href="{{ route('micl.vitumenPlant') }}" class=" dropdown-item {{ request()->is('bitumen-plant') ? 'active' : '' }}" >Bitumen Plant & Storage Tank </a>
                           
                            <a href="{{ route('micl.physical') }}" class="dropdown-item {{ request()->is('physical-refinery') ? 'active' : '' }}">Physical Refinery Unit</a>
                            <a href="{{ route('micl.dryFractionation') }}" class="dropdown-item {{ request()->is('super-oil-dry-fractionation') ? 'active' : '' }}">Super Oil Refinery & Dry fractionation Unit </a>
                            <a href="{{ route('micl.edibleOil') }}" class="dropdown-item {{ request()->is('edible-oil') ? 'active' : '' }}">Edible Oil Filling Plant </a>
                            <a href="{{ route('micl.bottle') }}" class="dropdown-item {{ request()->is('bottle-making') ? 'active' : '' }}">Bottle Making Plant </a>
                        </div>
                    </div>

                    <a href="{{ route('micl.area') }}" class="nav-item nav-link {{ request()->is('area-front') ? 'active' : '' }} ">Area</a>
                    <a href="{{ route('micl.contact') }}" class="nav-item nav-link {{ request()->is('contact-us') ? 'active' : '' }}">Contact Us</a>
                </div>
                
            </div>
        </nav>
        <!-- Navbar End -->

        @yield('frontendLayoutsYeild')
        {{-- footer-part --}}
                <!-- Footer Start -->
                <div class="container-fluid foot-back text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="container py-5">
                        <div class="row g-5">
                            <div class="col-lg-4">
                                <img src="./img/MEB/MEBLogo/Untitled-2.png" alt="" width="250px">
                                <p class="p-2">
                                    We are dedicated to do business to serve the consumers and customers in a unique and effective way. By doing so we shall aim to be a dominant performer in the business categories that we operate. 
                                </p>
                                <p class="mb-2"><i style="color: #ffc706;" class="fa fa-phone-alt me-3"></i>02-41356228</p>
                                <p class="mb-2"><i style="color: #ffc706;" class="fa fa-phone-alt me-3"></i>02-41356229</p>
                                <p class="mb-2"><i style="color: #ffc706;" class="fa fa-envelope me-3"></i>info@miclbd.com</p>
                            </div>

                            @forelse ($footer as $foot)
                            <div class="col-lg-4 col-md-6">
                                <h3 class="text-white mb-4">Get In Touch</h3>
                                <p class="mb-2"><b style="color: #ffc706;">Corporate Office :</b> 
                                    {!! $foot->corporate_office !!}
                                </p>
                                <p class="mb-2"><b style="color: #ffc706;">MICL Sales Office :</b> {!! $foot->sales_office !!}</p>
                                <p class="mb-2"><b style="color: #ffc706;">Factory :</b> {!! $foot->factory !!}</p>
                                
                                
                            </div>
                            @empty
                            <div class="col-lg-4 col-md-6">
                                <h3 class="text-white mb-4">Get In Touch</h3>
                                <p class="mb-2">
                                  <b style="color: #ffc706">Corporate Office :</b>
                                  Habib’s, (Level-4), 1574/A, East Nasirabad, Bayezid Bostami
                                  Road, Opposite side of Nasirabad Housing Society (Road No-03),
                                  Panchlaish, Chattogram - 4000, Bangladesh.
                                </p>
                                <p class="mb-2">
                                  <b style="color: #ffc706">MICL Sales Office :</b>
                                  269,Khatungonj,Chattogram.
                                </p>
                                <p class="mb-2">
                                  <b style="color: #ffc706">Factory :</b> North
                                  Patenga,CEPZ,CHattogram.
                                </p>
                              </div>  
                            @endforelse                               


                            {{-- footer quick links here --}}
                            <div class="col-lg-4 col-md-6">
                                <h3 class="text-white mb-4">Quick Links</h3>
                                <ul type="square">
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.aboutUs') }}">About Us</a></li>
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.storageTank') }}">Storage Tank Terminal & Delivery Support Services</a></li>
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.vitumenPlant') }}">Bitumen Plant & Storage Tank</a></li>
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.physical') }}">Physical Refinery Unit</a></li>
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.dryFractionation') }}">Super Oil Refinery & Dry fractionation Unit</a></li>
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.edibleOil') }}">Edible Oil Filling Plant </a></li>
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.bottle') }}">Bottle Making Plant  </a></li>
                                    <li><a style="color: #ffc706 !important;" class="text-white-50" href="{{ route('micl.contact') }}">Contact Us</a></li>  
                                </ul>
                            </div>
                         
                        </div>
                    </div>
                  
                </div>
                <!-- Footer End -->
        
        
                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            </div>
        

   

            

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="frontend/lib/wow/wow.min.js"></script>
            <script src="frontend/lib/easing/easing.min.js"></script>
            <script src="frontend/lib/waypoints/waypoints.min.js"></script>
            <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>
        
            
           
            <!-- Template Javascript -->
            <script src="frontend/js/main.js"></script>

         
        </body>
        
        </html>
