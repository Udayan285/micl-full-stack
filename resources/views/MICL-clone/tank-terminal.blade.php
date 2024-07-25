@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')
      <div class="conatiner">
        <div class="row">
          <h1 class="mb-4 text-center py-3 my-0">
            Storage Tank Terminal & Delivery Support Services
          </h1>
        </div>
      </div>

      <!-- innovation_gallery -->
      <div class="innovation_gallery d-flex gap-4 container col-lg-12">
        <!-- Innovation start -->
        <div class="py-5 col-lg-4 innovation">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="row">
                <ul class="list-group">
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Year of Establishment :</span>2019
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Storage Capacity (Existing) :</span>30,200 M.Ton
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Product Turnover :</span>18 Times/Year
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Inward Facility :</span>Direct from Mother Vessel.
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Jetty Facility for discharge :</span>TSP Jetty, RM-3, RM-4 TSP=800 Rft(Deep 7.9 Miter & Length
                    175.25 Miter), RM3=800Rft (Deep 7.6 Miter & Length 182.9
                    Miter), RM4=2350Rft (Deep 9.14 Miter & Length 160 Miter).
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Pipeline Facility :</span>Established & Company own.
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Delivery Facility :</span>Through Jetty , Lighter Vessel & Through Lorry.
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Outward Delivery (Lorry) :</span>Overhead Bulk Delivery point & Drum Delivery.
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Outward Delivery (Lorry) :</span>2 Nos.
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Weight Scale :</span>Electricity
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Utility Requirement :</span>20 Person
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Manpower Requirement :</span>Bonded Facility
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Opportunity :</span>
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Bonded Facility Approved for Items :</span>HFO/Edible Oil/Bitumen/Lubricant.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Innovation End-->

        <!-- Gallery Start -->
        <div class="py-2 col-lg-7">
          <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-5 align-items-center image_gallery">
              <div class="image col-lg-6">
                <img
                  src="{{ asset('frontend//img/MEB/Tank Terminal & Bitumen Plant/Tank.jpg') }}"
                  alt=""
                />
              </div>
              <div class="image col-lg-6">
                <img
                  src="{{ asset('frontend//img/MEB/Tank Terminal & Bitumen Plant/Terminal-Image-3.jpg') }}"
                  alt=""
                />
              </div>
              <div class="image col-lg-6">
                <img
                  src="{{ asset('frontend//img/MEB/Tank Terminal & Bitumen Plant/Terminal.jpg') }}"
                  alt=""
                />
              </div>
              <div class="image col-lg-6">
                <img
                  src="{{ asset('frontend//img/MEB/Tank Terminal & Bitumen Plant/Terminal1.jpg') }}"
                  alt=""
                />
              </div>
        
            </div>
          </div>
        </div>
        <!-- Gallery End -->
      </div>
@endsection

