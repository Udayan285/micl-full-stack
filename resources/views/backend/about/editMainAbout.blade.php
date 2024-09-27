@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
              {{-- Success message show here via alert --}}
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert"  id="status-alert">
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
                            <input type="file" multiple name="images[]" class="form-control" id="aboutImageFile" aria-describedby="emailHelp">  
                        </div>
                        @error('images')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2 aboutImage" style="margin-bottom: 10px;"></div>
                                <div class="col-md-2 aboutImage" style="margin-bottom: 10px;"></div>
                                <div class="col-md-2 aboutImage" style="margin-bottom: 10px;"></div>
                            </div>
                            
                            {{-- <img id="aboutImage"  src="{{ $aboutEdit ? asset('about-us/'.$aboutEdit->image_url) : '' }}" style="height: 100px; width:100px;" alt="About Image"> --}}
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
    let uploadImg = document.querySelector('#aboutImageFile');
    let imageViews = document.querySelectorAll('.aboutImage');

    function imgPreviewer(event) {
        let files = event.target.files;

        // Clear previous previews
        imageViews.forEach(view => view.innerHTML = '');

        // Loop through each selected file
        for (let i = 0; i < files.length; i++) {
            let url = URL.createObjectURL(files[i]);
            let imgElement = document.createElement('img');
            imgElement.src = url;
            imgElement.style.height = '100px';
            imgElement.style.width = '100px';
            imgElement.style.marginBottom = '10px';
            
            // Append the image to the corresponding .Imageview container
            if (imageViews[i]) {
                imageViews[i].appendChild(imgElement);
            } else {
                // If more images are selected than available containers, you can add more dynamically or handle accordingly
                console.log("More images selected than available containers.");
            }
        }
    }
    uploadImg.addEventListener('change', imgPreviewer);
    
        // Set timeout to hide the alert after 3 seconds
        setTimeout(function() {
            var alert = document.getElementById('status-alert');
            if (alert) {
                // Bootstrap fade-out
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    
</script>
@endpush


@endsection
