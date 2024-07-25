
@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

        <!-- Carousel Start -->
        @include('layouts.heroBanner')
        <!-- Carousel End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4 about-us-headline">Corporate Vision of MICL</h1>
                        <ul>
                            <li>
                                <p>
                                    We are dedicated to do business to serve the consumers and customers in a unique and effective way.  By doing so we shall aim to be a dominant performer in the business categories that we operate. 
                                </p>
                            </li>
                            
                            <li>
                                <p>
                                    We believe that profitable growths for our business require total commitment to excel in performance and productivity in order to create a sustainable business value. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    We preserve the trust of all our stakeholders by adopting ethical business practices support the society through CSR initiatives. Protect from environmental effect by maintaining necessary safeguards and security measures. 
                                </p>
                            </li>
                            <li>
                                <p>
                                    We are eying the future development of our nation by contributing significantly through our effortless service and commitment so that our next generation will build up with confidence and strong belief. By the grace of almighty Allah and through our effort we are moving forward to be a notable part of Golden Bangladesh. 
                                </p>
                            </li>
                        
                        </ul>
                       
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75  bg-light p-3" src="{{ asset('frontend/slider/slider3.jpg') }}" alt="">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
@endsection
