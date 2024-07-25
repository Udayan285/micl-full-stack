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

            {{-- homepage about edit section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update Home Page About Title,Description & Images</h6>
                    <form action="{{ route('dashboard.homeAboutUpdate',$homeAboutEdit->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputTitle" class="form-label">Update About Title</label>
                        <div class="mb-3">     
                            <input type="text" name="home_about_title" value="{{ $homeAboutEdit ? $homeAboutEdit->title : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('home_about_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Update About Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="home_about_description" placeholder="Leave a description here"
                                id="floatingTextarea" style="height: 150px;" >{{ $homeAboutEdit ? $homeAboutEdit->description : '' }}
                            </textarea>
                            
                        </div>
                        @error('home_about_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Update About Images</label>
                        <div class="mb-3">     
                            <input type="file" name="home_about_image" class="form-control" id="homeImageFile" aria-describedby="emailHelp">  
                        </div>
                        @error('home_about_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="homeAboutImage"  src="" style="height: 100px; width:100px;" alt="Home About Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>
            {{-- homepage about section endss --}}
        
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#homeImageFile')
    let display = document.querySelector('#homeAboutImage')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection
