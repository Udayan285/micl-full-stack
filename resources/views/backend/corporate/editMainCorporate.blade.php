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

            {{-- main corporate section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"> Update Corporate Title,Description & Images</h6>
                    <form action="{{ route('dashboard.corpoUpdate',$CorpoEdit->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputTitle" class="form-label">Corporate Title</label>
                        <div class="mb-3">     
                            <input type="text" name="corporate_title" value="{{ $CorpoEdit ? $CorpoEdit->title : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('corporate_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Corporate Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="corporate_description" placeholder="Leave a description here"
                                id="floatingTextarea" style="height: 150px;" >{{ $CorpoEdit ? $CorpoEdit->description : '' }}</textarea>
                            <label for="floatingTextarea">Type your corporate description...</label>
                        </div>
                        @error('corporate_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Update Corporate Images</label>
                        <div class="mb-3">     
                            <input type="file" id="imageFile" name="corporate_image" class="form-control"  aria-describedby="emailHelp">  
                        </div>
                        @error('corporate_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <img id="corporateImage"  src="{{ asset('corporates/'.$CorpoEdit->image_url) }}" style="height: 100px; width:100px;" alt="corporate image">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>
            {{-- main corporate section endss --}}
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('imgviewmaincorporate')
<script>
    let uploadImg = document.querySelector('#imageFile')
    let display = document.querySelector('#corporateImage')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush



@endsection


