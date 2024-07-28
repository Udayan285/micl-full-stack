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

            {{-- homepage corporate section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"> Update Home Page Corporate Title,Description & Images</h6>
                    <form action="{{ route('dashboard.homeCorpoUpdate',$homeCorpoEdit->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputTitle" class="form-label">Home Page Corporate Title</label>
                        <div class="mb-3">     
                            <input type="text" name="home_corporate_title" value="{{ $homeCorpoEdit ? $homeCorpoEdit->title : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('home_corporate_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Home Page Corporate Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="home_corporate_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" >{{ $homeCorpoEdit ? $homeCorpoEdit->description : '' }}</textarea>
                            
                        </div>
                        @error('home_corporate_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Update Home Page Corporate Images</label>
                        <div class="mb-3">     
                            <input type="file" name="home_corporate_image" class="form-control" id="homeCorporateFile" aria-describedby="emailHelp">  
                        </div>
                        @error('home_corporate_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <img id="homeCorporateImage"  src="{{ asset('homecorporate/'.$homeCorpoEdit->image_url) }}" style="height: 100px; width:100px;" alt="corporate image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>
            {{-- homepage corporate section endss --}}
        </div>
    </div>       
</div>

{{-- customjs for media upload --}}
@push('imgviewhomecorporate')
<script>
    let uploadImg = document.querySelector('#homeCorporateFile')
    let display = document.querySelector('#homeCorporateImage')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush

@endsection
