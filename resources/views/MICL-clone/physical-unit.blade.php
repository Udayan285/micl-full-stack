@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

      <div class="conatiner">
        <div class="row">
          <h1 class="mb-4 text-center py-3 my-0">
            Physical Refinery Unit
          </h1>
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
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Year of Establishment :</span>
                    2005
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Plant Manufacturer :</span>
                    Lipico (Singapore)’ PTE
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Country of Origin :</span>Malaysia, Japan, USA & EU
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Prime Raw Material :</span>CP Olein
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Product :</span> RPO (Refined Palm Oil)
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Pack Size :</span>  PET Bottle & Bulk
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Existing Capacity :</span>  1,98,000 M.T/ Year
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Utility Requirement :</span>  Gas, Electricity & Water.
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Manpower Requirement :</span>  30 Nos.
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Present Status :</span>  In Operation
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
                  class="col-lg-4"
                  src="{{ asset('frontend/img/MEB/physical-unit/phy1.jpg') }}"
                  alt=""
                />
              </div>
              <div class="image col-lg-6">
                <img
                  class="col-lg-4"
                  src="{{ asset('frontend/img/MEB/physical-unit/phy2.jpg') }}"
                  alt=""
                />
              </div>
            
              <div class="image col-lg-6">
                <img
                  class="col-lg-4"
                  src="{{ asset('frontend/img/MEB/physical-unit/phy4.jpg') }}"
                  alt=""
                />
              </div>
              <div class="image col-lg-6">
                <img
                  class="col-lg-4"
                  src="{{ asset('frontend/img/MEB/physical-unit/phy5.jpg') }}"
                  alt=""
                />
              </div>
             
              
            </div>
          </div>
        </div>
        <!-- Gallery End -->
      </div>
@endsection
   

