@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update Banner Title & Description</h6>
                    <form action="{{ route('dashboard.heroUpdate',$bannerEdit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Success message show here via alert --}}
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <label for="exampleInputTitle" class="form-label">Banner Headline</label>
                        <div class="mb-3">     
                            <input type="text" name="banner_title" value="{{ $bannerEdit ? $bannerEdit->title : '' }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('banner_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Banner Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="banner_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" >{{ $bannerEdit->description }}</textarea>
                            
                        </div>
                        @error('banner_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Banner Images</label>
                        <div class="mb-3">     
                            <input type="file" name="banner_image" class="form-control" id="imageFileBanner" aria-describedby="emailHelp">  
                        </div>
                        @error('banner_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <img id="corporateImageBanner"  src="{{ asset('images/'.$bannerEdit->image_url) }}" style="height: 100px; width:100px;" alt="corporate image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>

        </div>
    </div>       
</div>
{{-- Custom javascript here for media upload --}}
@push('imgviewbanner')
<script>
    let uploadImg = document.querySelector('#imageFileBanner')
    let display = document.querySelector('#corporateImageBanner')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection