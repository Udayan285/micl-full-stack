
@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')
        <!-- Carousel Start -->
        @include('layouts.heroBanner')
        <!-- Carousel End -->

        <!-- home corporate Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">{{ $homeCorporate ? $homeCorporate->title : "Example Title" }}</h1>
                        <p>{{ $homeCorporate ? $homeCorporate->description : "Example description" }}</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <a class="btn btn-primary rounded-pill py-3 px-5" href="corporate.html">Read More</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75  bg-light p-3" src="{{ asset('homecorporate/'.$homeCorporate->image_url) }}" alt="Home Page Corporate Image">
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- home corporate End -->


        <!-- about Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" alt="home-about-image" src="{{ asset('about-us/'.$homeAbout->image_url) }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 modified-cls wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4 about-us-headline">{{ $homeAbout->title }}</h1>
                                <p class="mb-4">
                                 {{ $homeAbout->description }} 
                                </p>
                                <a class="btn btn-primary py-3 px-5" href="about.html">Read More...<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about End -->
@endsection
