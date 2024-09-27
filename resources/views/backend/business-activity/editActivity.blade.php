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

            {{-- activity edit section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Activity Update - Title,Description & Images</h6>
                    <form action="{{ route('dashboard.activityUpdate',$activityEdit->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputTitle" class="form-label">Update Activity - Title</label>
                        <div class="mb-3">     
                            <input type="text" name="activity_title" value="{{ $activityEdit ? $activityEdit->title : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('activity_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Update Activity - Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="activity_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" >{{ $activityEdit ? $activityEdit->description : '' }}</textarea>
                            
                        </div>
                        @error('activity_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Update Activity - Image</label>
                        <div class="mb-3">     
                            <input type="file" name="activity_image" class="form-control" id="activityFile" aria-describedby="emailHelp">  
                        </div>
                        @error('activity_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="activityImages"  src="{{ $activityEdit ? asset($activityEdit->image_url) : '' }}" style="height: 100px; width:100px;" alt="Area Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>
            {{-- activity edit section endss --}}
   
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#activityFile')
    let display = document.querySelector('#activityImages')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection