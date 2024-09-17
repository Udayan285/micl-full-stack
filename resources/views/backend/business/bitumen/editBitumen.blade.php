@extends('layouts.backendLayouts')

@section('backendLayoutsPart')

<div class="container mt-2 mb-2">
  <div style="display: flex; justify-content: flex-end;">
    <a href="{{ route('dashboard.previewBitumen') }}"><button class="btn btn-sm btn-primary mt-3">Back</button></a>
  </div>
  <h3 id="description">Edit Bitumen Plant & Storage Tank</h3>
  <form action="{{ route('dashboard.bitumenUpdate',$bitumenEdit->id) }}" method="POST" id="survey-form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <ul class="flex-outer">
    {{-- Success message show here via alert --}}
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif 
    
    @error('prime_raw_material')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Prime Raw Material</label>
      <textarea id="textArea" name="prime_raw_material" rows="4" cols="50">{{ $bitumenEdit ? $bitumenEdit->prime_raw_material : '' }}</textarea>
    </li>
    
    @error('product')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Product</label>
      <textarea id="textArea" name="product" rows="4" cols="50">{{ $bitumenEdit ? $bitumenEdit->product : '' }}</textarea>
    </li>

    @error('present_status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Present Status</label>
      <textarea id="textArea" name="present_status" rows="4" cols="50">{{ $bitumenEdit ? $bitumenEdit->present_status : '' }}</textarea>
    </li>


   {{-- images attchment --}}
    @error('images.*')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="images">Select Multiple Images</label>
      <input name="images[]" multiple id="ImageFile" type="file"></input>
    </li>

     {{-- images show here via ajax --}}
      <li>
        <label for="">All Images</label>
        <div class="row">
            @if($bitumenEdit && $bitumenEdit->images)
                @php
                    $images = explode('|', $bitumenEdit->images); // Split string into an array using the pipe as a delimiter
                @endphp
                @foreach($images as $image)
                    <div class="col-md-4 Imageview" style="margin-bottom: 10px;">
                        <img src="{{ asset($image) }}" style="height:100px;width:100px;" alt="Image" class="img-fluid">
                    </div>
                @endforeach
            @endif
        </div>

        <div>
            <div class="row">
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            <div class="col-md-4 Imageview" style="margin-bottom: 10px;"></div>
            </div>
        </div>
      </li>
      <li>
        <button id="submit" type="submit">Update Now</button>
      </li>
    </ul>
  </form>
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#ImageFile');
    let imageViews = document.querySelectorAll('.Imageview');

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