
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
                        @isset($homeCorporate)
                        <h1 class="mb-4">{{ $homeCorporate->title }}</h1>
                        <p>{!! $homeCorporate->description !!}</p>
                        @else
                            <h1 class="mb-4">Our Corporate Vision</h1>
                            <p>We are dedicated to do business to serve the consumers and customers in a unique and effective way. By doing so we shall aim to be a dominant performer in the business categories that we operate. We believe that profitable growths for our business...
                            </p>
                        @endisset
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('micl.corporate') }}">Read More</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                            @isset($homeCorporate)
                                <img class="img-fluid w-75 bg-light p-3" src="{{ asset('homecorporate/'.$homeCorporate->image_url) }}" alt="Home Page Corporate Image">
                            @else
                                <img class="img-fluid w-75 bg-light p-3" src="{{ asset('frontend/img/MEB/bitumin storages/Bitumen Storage.jpg') }}" alt="Corporate Image">
                            @endisset
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
                            @isset($homeAbout)
                            <img class="position-absolute w-100 h-100 rounded" alt="home-about-image" src="{{ $homeAbout ? asset('about-us/'.$homeAbout->image_url) : '' }}" alt="Homepage about image" style="object-fit: cover;">
                            @else
                            <img class="position-absolute w-100 h-100 rounded" alt="home-about-image" src="{{ asset('frontend/img/MEB/Tank Terminal & Bitumen Plant/New folder/Bitumen Drum Plant.png') }}" alt="Homepage about image" style="object-fit: cover;">
                            @endisset
                               
                            </div>
                        </div>
                        <div class="col-lg-6 modified-cls wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                @isset($homeAbout)
                                <h1 class="mb-4">{{ $homeAbout->title }}</h1>
                                <p>{!! $homeAbout->description !!}</p>
                                @else
                                    <h1 class="mb-4">About Us</h1>
                                    <p>
                                        MEB Industrial Complex Ltd. (hereafter refer to as MICL) is a Private Limited Company which was established on 20th July-2005 under Registrar of Joint Stock Company, Bangladesh and started its operation in August2010... 
                                    </p>
                                @endisset
                                <a class="btn btn-primary py-3 px-5" href="{{ route('micl.aboutUs') }}">Read More...<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about End -->

        <!-- business activities Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        @isset($homeCorporate)
                        <h1 class="mb-4">{{ $homeCorporate->title }}</h1>
                        <p>{!! $homeCorporate->description !!}</p>
                        @else
                            <h1 class="mb-4">Business activities</h1>
                            <p>The company is engaged in Tank Terminal Services for Storage & Delivery of Bulk Petroleum Bitumen, HFO, Edible Oil items and manufacturing units of Edible Oil.
                            </p>
                        @endisset
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                            @isset($homeCorporate)
                                <img class="img-fluid w-75 bg-light p-3" src="{{ asset('homecorporate/'.$homeCorporate->image_url) }}" alt="Home Page Corporate Image">
                            @else
                                <img class="img-fluid w-75 bg-light p-3" src="{{ asset('frontend/img/MEB/bitumin storages/Bitumen Storage.jpg') }}" alt="Corporate Image">
                            @endisset
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- business activites End -->
@endsection
