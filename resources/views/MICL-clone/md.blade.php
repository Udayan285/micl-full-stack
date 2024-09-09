@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

      <!-- md-profile Start -->
      @forelse ($mdData as $md)
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
                  src="{{asset($md->image_url)}}"
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
      @empty
      <!-- manager empty part Start -->
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
                  src="{{ asset('frontend/img/MEB/MD.jpg') }}"
                  alt=""
                  style="width: 100%"
                />
              </div>
            </div>
            <div class="col-lg-8 wow fadeInUp " data-wow-delay="0.1s">
              <ul style="list-style-type: none" >
                <li>
                  <h1>Mr. Mohammed Shouib</h1>
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
                Mr. Mohammed Shouib is a highly motivated, enthusiastic, and
                natural visionary entrepreneur was born on 6th August 1981in
                Chittagong. He is the oldest grandson of the legendary
                businessman of Bangladesh Late Mr. Mohammed Elias and the son of
                Mr. Mohammed Shamsul Alam. Mr. Mohammed Shamsul Alam is also a
                renowned businessman who has successfully handed over the
                business to Mr. Mohammed Shouib. He has surrounded himself with
                our country’s business leaders and successful individuals from a
                very young age. He was the youngest director in the history of
                Chittagong Chamber of Commerce and Industries as well as the
                youngest member of The Federation of Bangladesh Chambers of
                Commerce and Industry (FBCCI). He has completed his BBA Degree
                from San Jose State University, California, USA to develop
                himself in the field of the business arena. After completing his
                BBA he has returned to Bangladesh and started his business as a
                Managing Director of the MEB Industrial Complex Ltd. which is a
                manufacturing and service-oriented industry of Edible Oil,
                Drinking Water, Carbonated Soft Drinks, bitumen, tank terminal,
                etc. He then established Nahar Trading Corporation Ltd. to
                enhance his business in the trading sector to import daily
                consumable food items. In a short period,he has successfully
                established another new companies named Nahar Holdings Ltd.Which is ventured into the real
                estate sector. His enthusiasm, dedication, dynamic,
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
      <!-- manager empty part End -->
      @endforelse
      <!-- md-profile End -->

@endsection