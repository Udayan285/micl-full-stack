@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

      <div class="conatiner">
        <div class="row">
          <h1 class="mb-4 text-center py-3 my-0">Bottle Making Plant</h1>
        </div>
      </div>

      <!-- innovation_gallery -->
      <div class="innovation_gallery d-flex gap-4 container">
        <!-- Innovation start -->
        <div class="py-5 col-lg-4 innovation">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="row">
                <ul class="list-group">
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Year of Establishment :</span> 2005
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Plant Manufacturer :</span> HMW & MG
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Country of Origin :</span> China, USA & Germany
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Injection Machine :</span> 16 Nos
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Blowing Machine :</span> 12 Nos
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Existing Capacity :</span> 5 Crore Pcs/ Year
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Prime Raw Material :</span> Pet Resin, HDPE, LDPE
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Product :</span> Different Size Bottle
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Utility Requirement :</span> Gas, Electricity & Water.
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Manpower Requirement :</span> 80 Nos
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
                <img src="{{ asset('frontend/img/MEB/Bottle making/Bottle Making 1.jpg') }}" alt="" />
              </div>
              <div class="image col-lg-6">
                <img src="{{ asset('frontend/img/MEB/Bottle making/Bottle Making...jpg') }}" alt="" />
              </div>
              <div class="image col-lg-6">
                <img src="{{ asset('frontend/img/MEB/Bottle making/Bottle Making.jpg') }}" alt="" />
              </div>
              <div class="image col-lg-6">
                <img src="{{ asset('frontend/img/MEB/Bottle making/Bottle Making2.jpg') }}" alt="" />
              </div>
              <div class="image col-lg-6">
                <img
                  src="{{ asset('frontend/img/MEB/Bottle making/pet-bottle-blowing-line.jpg') }}"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
        <!-- Gallery End -->
      </div>

@endsection