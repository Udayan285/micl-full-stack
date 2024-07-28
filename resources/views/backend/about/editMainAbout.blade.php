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

            {{-- aboutpage about edit section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update About Title,Description & Images</h6>
                    <form action="{{ route('dashboard.aboutUpdate',$aboutEdit->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputTitle" class="form-label">Update About Title</label>
                        <div class="mb-3">     
                            <input type="text" name="about_title" value="{{ $aboutEdit ? $aboutEdit->title : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('about_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Update About Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="about_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" >{{ $aboutEdit ? $aboutEdit->description : '' }}
                            </textarea>
                            
                        </div>
                        @error('about_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Update About Images</label>
                        <div class="mb-3">     
                            <input type="file" name="about_image" class="form-control" id="imageFile" aria-describedby="emailHelp">  
                        </div>
                        @error('about_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="aboutImage"  src="" style="height: 100px; width:100px;" alt="About Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>
            {{-- aboutpage about section endss --}}
        
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#imageFile')
    let display = document.querySelector('#aboutImage')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection
