@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

      <!-- About Start -->
      @foreach ($mdData as $md)
      <div class="container-xxl py-5">
        <div class="container">
          <div class="d-flex align-items-center flex-wrap ">
            <div
              class="col-lg-4 about-img wow fadeInUp"
              data-wow-delay="0.5s"
            >
              <div class="text-center w-100 p-5">
                <img
                  class="img-fluid bg-light p-3"
                  src="{{asset('md/'.$md->image_url)}}"
                  alt=""
                  style="width: 100%"
                />
              </div>
            </div>
            <div class="col-lg-8 wow fadeInUp " data-wow-delay="0.1s">
              <ul style="list-style-type: none" >
                <li>
                  <h1>{{ $md->name }}</h1>
                </li>

                <li>
                  <div class="ms-3">
                    <h6 class="text-primary mb-1">
                      MEB Industrial Complex Ltd.
                    </h6>
                    <small>Managing Director</small>
                  </div>
                  
                </li>

                <li>
                  
                </li>
              </ul>
              <p class="w-100">
                {!! $md->description !!}
              </p>
            </div>
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
              <p>
                and foreseeing leadership carry all his ventures quite smoothly
                and successfully. His highly visionary ambition is not over yet
                and aims to invest in the various profitable ventures as well as
                public welfare sectors in near future. He has developed a strong
                and high-level international network of business relationship to
                develop business in Bangladesh.<br />
                All in all his true vision is; to serve with integrity, quality
                that adds values to his countrymen and thus helping the economy
                and the standards’ of human life. Religion, discipline, healthy
                life, family values and dedications are his motto of life. With
                respect and good communications, he believes everything is
                possible. Since we all have one life to live, all possibilities
                should be exercised.
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- About End -->

@endsection