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

            {{-- area edit section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Area Update - Title,Description & Images</h6>
                    <form action="{{ route('dashboard.areaUpdate',$areaEdit->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputTitle" class="form-label">Update Area - Title</label>
                        <div class="mb-3">     
                            <input type="text" name="area_title" value="{{ $areaEdit ? $areaEdit->title : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('area_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Update Area - Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="area_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" >{{ $areaEdit ? $areaEdit->description : '' }}</textarea>
                            
                        </div>
                        @error('area_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Update Area - Image</label>
                        <div class="mb-3">     
                            <input type="file" multiple name="images[]" class="form-control" id="area_image" aria-describedby="emailHelp">  
                        </div>
                        @error('images*')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2 areaImage" style="margin-bottom: 10px;"></div>
                                <div class="col-md-2 areaImage" style="margin-bottom: 10px;"></div>
                                <div class="col-md-2 areaImage" style="margin-bottom: 10px;"></div>
                            </div>                          
                        </div>
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>
            {{-- area edit section endss --}}
   
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#area_image');
    let imageViews = document.querySelectorAll('.areaImage');

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
</script>
@endpush


@endsection
