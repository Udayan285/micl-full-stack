@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')


        <!-- Carousel Start -->
        @include('layouts.heroBanner')
        <!-- Carousel End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    @forelse ($about as $data)
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4 about-us-headline">{{ $data->title }}</h1>
                        <ul>
                            <li>
                                <p>
                                    {!! $data->description !!}
                                </p>
                            </li>        
                        </ul>
                       

                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75  bg-light p-3" src="{{ asset('about-us/'.$data->image_url) }}" alt="About Image">
                            </div>
                            
                        </div>
                    </div>
                    @empty
                     <!-- About Start -->
                        <div class="container-xxl py-5">
                            <div class="container">
                                <div class="row g-5 align-items-center">
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <h1 class="mb-4 about-us-headline">Company background</h1>
                                        <ul>
                                            <li>
                                                <p>MEB Industrial Complex Ltd. (hereafter refer to as MICL) is a Private Limited Company which was established on 20th July-2005 under Registrar of Joint Stock Company, Bangladesh and started its operation in August2010.</p>
                                            </li>
                                            
                                            
                                            <li>
                                                <p>The company has a very big Manufacturing & Refinery facility, Terminal setup located at North Potenga, Airport Road (Opposite of ERL gate), Bandar (Seaport), Chattogram, Bangladesh. It is in the southern part of Chattogram Port city. Its Corporate Head Office is located at Habib’s, (Level-4), 1574/A, East Nasirabad, Bayezid Bostami Road, Opposite side of Nasirabad Housing Society (Road No-03), Panchlaish, Chattogram - 4000, Bangladesh.</p>
                                            </li>
                                            <li>
                                                <p>
                                                    MEB Industrial Complex Limited quickly developed a very competent management team, which promotes the quality of products and service with specialties throughout the country. The company has a clear vision to become a leading service provider within a short period of time. 
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    MICL introduce itself a leading business conglomerate in the country in a short span of time by the enhancement of economic competitive. Growth of productivity and profitability of the company ensures through efficiency and effectiveness. MICL emphasis on service oriented business for maintaining consistence of sustainable business grouth.
                                                </p>
                                            </li>
                                        
                                        </ul>
                                    
                                    </div>
                                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <img class="img-fluid w-75  bg-light p-3" src="{{ asset('frontend/img/MEB/Tank Terminal & Bitumen Plant/Terminal.jpg') }}" alt="about-image">
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
        <!-- About End -->

@endsection