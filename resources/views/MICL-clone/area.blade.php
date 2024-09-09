
@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

        <!-- Carousel Start -->
        @include('layouts.heroBanner')
        <!-- Carousel End -->


        <!-- Area Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    @forelse ($areaData as $data)
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                        <h1 class="mb-4 about-us-headline">{{ $data->title }}</h1>
                        
                        <div>  
                        {!! $data->description !!}
                        </div> 

                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75  bg-light p-3" src="{{ asset('area/'.$data->image_url) }}" alt="area image">
                            </div>
                            
                        </div>
                    </div>
                    @empty
                    <!-- About Start -->
                    <div class="container-xxl py-5">
                        <div class="container">
                            <div class="row g-5 align-items-center">
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <h1 class="mb-4 about-us-headline">Factory Location,Area & Demographic Advantages</h1>
                                    <ul>
                                        <li>
                                            <p>Situated at North Patenga, Chittagong.</p>
                                        </li>
                                        <li>
                                            <p>
                                            Nearest to Chittagong Sea Port area.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                On the bank of the Karnafully River.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Linked with to the Airport Road of Chittagong.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Chittagong Port Road (Seaport & Airport) is in front of the zone which is linked with Dhaka Trunk Road & Asian Highway.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Nearest (1.5 km) to the karnafully river tunnel which is connected to the KEPZ, new & extended Seaport at Anowara & Industrial Zone of Chattogram southern part.
                                            </p>
                                        </li>
                                    
                                    </ul>
                                
                                </div>
                                <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img class="img-fluid w-75  bg-light p-3" src="{{ asset('frontend/img/MEB/Tank Terminal & Bitumen Plant/Terminal.jpg') }}" alt="">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About End -->
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Area End -->

@endsection