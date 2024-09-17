@extends('layouts.backendLayouts')

@section('backendLayoutsPart')

<div class="container mt-2 mb-2">
  
  <div style="display: flex; justify-content: flex-end;">
    <a href="{{ route('dashboard.preview') }}"><button class="btn btn-sm btn-primary mt-3">Back</button></a>
  </div>

  <h3 id="description">Edit Storage Tank Terminal & Delivery Support Services </h3>
  <form action="{{ route('dashboard.storageUpdate',$storageEdit->id) }}" method="POST" id="survey-form" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <ul class="flex-outer">
      {{-- Success message show here via alert --}}
      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    
    @error('inward_facility')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Inward Facility</label>
      <textarea name="inward_facility" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->inward_facility : '' }}</textarea>
    </li>
    
    @error('jetty_facility')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Jetty Facility for discharge</label>
      <textarea name="jetty_facility" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->jetty_facility : '' }}</textarea>
    </li>

    @error('pipeline_facility')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Pipeline Facility</label>
      <textarea name="pipeline_facility" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->pipeline_facility : '' }}</textarea>
    </li>

    @error('delivery_facility')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Delivery Facility</label>
      <textarea name="delivery_facility" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->delivery_facility : '' }}</textarea>
    </li>

    @error('outward_delivey')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Outward Delivery (Lorry)</label>
      <textarea name="outward_delivey" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->outward_delivey : '' }}</textarea>
    </li>

    @error('weight_scale')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <li>
      <label for="textArea">Weight Scale</label>
      <textarea name="weight_scale" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->weight_scale : '' }}</textarea>
    </li>

      @error('utility_requirement')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <li>
        <label for="textArea">Utility Requirement</label>
        <textarea name="utility_requirement" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->utility_requirement : '' }}</textarea>
      </li>

      @error('manpower_requirement')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <li>
        <label for="textArea">Manpower Requirement</label>
        <textarea name="manpower_requirement" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->manpower_requirement : '' }}</textarea>
      </li>

      @error('opportunity')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <li>
        <label for="textArea">Opportunity</label>
        <textarea name="opportunity" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->opportunity : '' }}</textarea>
      </li>

      @error('bonded_facility')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <li>
        <label for="textArea">Bonded Facility Approved for Items</label>
        <textarea name="bonded_facility" id="textArea" rows="4" cols="50">{{ $storageEdit ? $storageEdit->bonded_facility : '' }}</textarea>
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
        <div>
        
          <div class="row">
              @if($storageEdit && $storageEdit->images)
                  @php
                      $images = explode('|', $storageEdit->images); // Split string into an array using the pipe as a delimiter
                  @endphp
                  @foreach($images as $image)
                      <div class="col-md-4 Imageview" style="margin-bottom: 10px;">
                          <img src="{{ asset($image) }}" style="height:100px;width:100px;" alt="Image" class="img-fluid">
                      </div>
                  @endforeach
              @endif
          </div>
          
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