@extends('layouts.frontendLayouts')
@section('frontendLayoutsYeild')
      <div class="conatiner">
        <div class="row">
          <h1 class="mb-4 text-center py-3 my-0">
            Bitumen Plant & Storage Tank
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
                    <span>Service (Delivery) Tank capacity :</span>
                    17,201.714 M.Ton
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Service (Delivery) Tank capacity :</span>
                    700 M.Ton
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Product Turnover (Yearly) :</span>1,35,000 M.Tons
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Prime Raw Material :</span>Bitumen
                  </li>
                  <li class="list-group-item px-3 border-0 rounded-3 mb-2">
                    <span>Product :</span> DADA Brand Bitumen (In Bulk & in drum)
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
                  src="{{ asset('frontend//img/MEB/bitumin storages/Bitumen tank.jpg') }}"
                  alt=""
                />
              </div>
              <div class="image col-lg-6">
                <img
                  class="col-lg-4"
                  src="{{ asset('frontend//img/MEB/bitumin storages/Bitumen Storage.jpg') }}"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
        <!-- Gallery End -->
      </div>
@endsection

