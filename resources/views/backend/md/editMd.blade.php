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

            {{-- md section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit - Name,Description & Image</h6>
                    <form action="{{ route('dashboard.mdUpdate',$mdEdit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputTitle" class="form-label">Edit - Name</label>
                        <div class="mb-3">     
                            <input type="text" name="name" value="{{ $mdEdit ? $mdEdit->name : '' }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Edit - Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" >{{ $mdEdit ? $mdEdit->description : '' }}</textarea>
                            
                        </div>
                        @error('description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Edit - Image</label>
                        <div class="mb-3">     
                            <input type="file" name="image" class="form-control" id="manager_image" aria-describedby="emailHelp">  
                        </div>
                        @error('image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="manager_image_main"  src="{{ asset('md-profile/'.$mdEdit->image_url) }}" style="height: 100px; width:100px;" alt="MD Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
            {{-- md section endss --}}

        
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#manager_image')
    let display = document.querySelector('#manager_image_main')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection
