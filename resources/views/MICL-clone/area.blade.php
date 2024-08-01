
@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

        <!-- Carousel Start -->
        @include('layouts.heroBanner')
        <!-- Carousel End -->


        <!-- Area Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    @foreach ($areaData as $data)
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
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Area End -->

@endsection