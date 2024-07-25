
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel carousel-responsive header-carousel position-relative">
        
       
        @foreach ($bannersData as $data)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('images/'.$data->image_url) }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                             <h1 class="display-2 text-white animated slideInDown mb-4">{{ $data->title }}</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">{{ $data->description }}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
       
        {{-- @else
      
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('frontend/img/MEB/bitumin storages/Bitumen Storage.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                             <h1 class="display-2 text-white animated slideInDown mb-4">Hello bitumen</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">This is bitumen description</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endif --}}

        
        
    </div>
</div>
<!-- Carousel End -->


