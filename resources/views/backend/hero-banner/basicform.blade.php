@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Banner Title & Description</h6>
                    <form action="{{ route('dashboard.heroStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Success message show here via alert --}}
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="status-alert">
                              <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <label for="exampleInputTitle" class="form-label">Banner Headline</label>
                        <div class="mb-3">     
                            <input type="text" name="banner_title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('banner_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Banner Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="banner_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('banner_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Banner Images</label>
                        <div class="mb-3">     
                            <input type="file" name="banner_image" class="form-control" id="imageFile" aria-describedby="emailHelp">  
                        </div>
                        @error('banner_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <img id="heroImage"  src="" style="height: 100px; width:100px;" alt="banner image">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Banner related all information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Banner Headline</th>
                                <th scope="col">Banner Description</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($banners as $key=>$banner)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $banner->title }}</td>
                                <td>{!! $banner->description !!}</td>
                                <td>
                                    <img src="{{ asset('images/'.$banner->image_url) }}" alt="Banner Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                    {{-- <button class="btn btn-warning btn-sm">Active</button> --}}
                                    <form action="{{ route('dashboard.heroActive',$banner->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $banner->status == 0 ? "warning" : "success" }} btn-sm mt-2">{{ $banner->status == 0 ? "Active" : "Deactive" }}</button>
                                    </form>
                                    
                                    <form action="{{ route('dashboard.heroEdit',$banner->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.heroRemove',$banner->id) }}" method="POST">
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
        </div>
    </div>       
</div>

@push('imgviewmaincorporate')
<script>
    let uploadImg = document.querySelector('#imageFile')
    let display = document.querySelector('#heroImage')
    
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


