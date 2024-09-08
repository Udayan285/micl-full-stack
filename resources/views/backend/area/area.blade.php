@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
              {{-- Success message show here via alert --}}
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" id="status-alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

            {{-- area section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Area - Title,Description & Images</h6>
                    <form action="{{ route('dashboard.areaStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleInputTitle" class="form-label">Area - Title</label>
                        <div class="mb-3">     
                            <input type="text" name="area_title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('area_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Area - Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="area_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('area_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Area - Image</label>
                        <div class="mb-3">     
                            <input type="file" name="area_image" class="form-control" id="area_image" aria-describedby="emailHelp">  
                        </div>
                        @error('area_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="area_image_main"  src="" style="height: 100px; width:100px;" alt="Area Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- area section endss --}}


            {{-- area section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Area Page Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Area Headline</th>
                                <th scope="col">Area Description</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($areas as $key=>$area)
                                
                                           
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $area->title }}</td>
                                <td>{!! $area->description !!}</td>
                                <td>
                                    <img src="{{ asset('area/'.$area->image_url) }}" alt="Area Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                   
                                    <form action="{{ route('dashboard.areaActive',$area->slug) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $area->status == 0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $area->status == 0 ? 'Active' : 'Deactive' }}</button>
                                       
                                    </form>
                                    
                                    <form action="{{ route('dashboard.areaEdit',$area->slug) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.areaRemove',$area->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form>
                                    
                                </td>
                               
                            </tr>  
                            @endforeach 

                                                                         
                        </tbody>
                    </table>
                </div>
            </div>
            {{--area section show table ends--}}

        
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#area_image')
    let display = document.querySelector('#area_image_main')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);

    // Set timeout to hide the alert after 3 seconds
    setTimeout(function()
    {
            var alert = document.getElementById('status-alert');
            if (alert) {
                // Bootstrap fade-out
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
    }, 3000);
</script>
@endpush


@endsection
