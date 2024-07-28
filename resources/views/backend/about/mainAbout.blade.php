@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
              {{-- Success message show here via alert --}}
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

            {{-- about us section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">About-us Title,Description & Images</h6>
                    <form action="{{ route('dashboard.aboutStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleInputTitle" class="form-label">About Title</label>
                        <div class="mb-3">     
                            <input type="text" name="about_title"  class="form-control" id="about_title" aria-describedby="emailHelp">  
                        </div>
                        @error('about_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">About Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="about_description" 
                                id="summernote" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('about_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">About Image</label>
                        <div class="mb-3">     
                            <input type="file" name="about_image" class="form-control" id="aboutImageFile" aria-describedby="emailHelp">  
                        </div>
                        @error('about_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="aboutImage"  src="" style="height: 100px; width:100px;" alt="Home About Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- habout section endss --}}


            {{-- about section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">About Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">About Headline</th>
                                <th scope="col">About Description</th>
                                <th scope="col">Images</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $key=>$about)                                                                          
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $about->title }}</td>
                                <td>{!! $about->description !!}</td>
                                <td>
                                    <img src="{{ asset('about-us/'.$about->image_url) }}" alt="About Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                   
                                    <form action="{{ route('dashboard.aboutActive',$about->slug) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $about->status ==0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $about->status ==0 ? 'Active' : 'Deactive' }}</button>
                                    </form>
                                    
                                    <form action="{{ route('dashboard.aboutEdit',$about->slug) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.aboutRemove',$about->slug) }}" method="POST">
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
            {{-- about section show table ends--}}

        
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#aboutImageFile')
    let display = document.querySelector('#aboutImage')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection
