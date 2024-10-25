@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')
      <div class="container">
        <div class="row">
          <h1 class="mb-4 text-center py-3 my-0">
            Storage Tank Terminal & Delivery Support Services
          </h1>
        </div>
      </div>

      <!-- innovation_gallery -->
      <div class="innovation_gallery d-flex gap-4 container col-lg-12">
        @forelse($storages as $key=>$data)
        <!-- Innovation start -->
        <div class="py-5 col-lg-4 innovation">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="row">
                <ul class="list-group">
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Inward Facility :</span>{{ $data->inward_facility  }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Jetty Facility for discharge :</span>{{ $data->jetty_facility }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Pipeline Facility :</span>{{ $data->pipeline_facility }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Delivery Facility :</span>{{ $data->delivery_facility }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Outward Delivery (Lorry) :</span>{{ $data->outward_delivey }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Weight Scale :</span>{{ $data->weight_scale }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Utility Requirement :</span>{{ $data->utility_requirement }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Manpower Requirement :</span>{{ $data->manpower_requirement }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Opportunity :</span>{{ $data->opportunity }}
                  </li>
                  <li class="list-group-item  px-3 border-0 rounded-3 mb-2">
                    <span>Bonded Facility Approved for Items :</span>{{ $data->bonded_facility }}
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
              @php
                $images = explode('|',$data->images);
              @endphp
              @foreach($images as $image)
              <div class="image col-lg-6">
                <img
                  src="{{ asset($image) }}"
                  alt="storage-tank-image"
                />
              </div> 
              @endforeach
            </div>
          </div>
        </div>
        <!-- Gallery End -->
        @empty
        <div class="col-lg-12">
          <div class="alert alert-warning" role="alert">
            Nothing to preview
          </div>
        </div>

        @endforelse
      </div>
@endsection

