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
                            <input type="file" name="area_image" class="form-control" id="areaFile" aria-describedby="emailHelp">  
                        </div>
                        @error('area_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="areaImages"  src="{{ $areaEdit ? asset('area/'.$areaEdit->image_url) : '' }}" style="height: 100px; width:100px;" alt="Area Image">
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
    let uploadImg = document.querySelector('#areaFile')
    let display = document.querySelector('#areaImages')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection
