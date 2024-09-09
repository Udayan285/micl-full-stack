@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            {{-- Success message show here via alert --}}
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" id="status-alert" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- user profile starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit - Name,Description,Contact & Image</h6>
                    <form action="{{ route('dashboard.mdStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleInputTitle" class="form-label">Name</label>
                        <div class="mb-3">     
                            <input type="text" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">About me</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <label for="exampleInputTitle" class="form-label">Email</label>
                        <div class="mb-3">     
                            <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputTitle" class="form-label">Contact</label>
                        <div class="mb-3">     
                            <input type="text" name="contact"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('contact')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <label for="exampleInputDescription" class="form-label mt-2">Profile Picture</label>
                        <div class="mb-3">     
                            <input type="file" name="image" class="form-control" id="manager_image" aria-describedby="emailHelp">  
                        </div>
                        @error('image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="manager_image_main"  src="" style="height: 100px; width:100px;" alt="Profile Picture">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
            {{-- user profile endss --}}

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

    // Set timeout to hide the alert after 3 seconds
    setTimeout(function()
    {
            var alert = document.getElementById('status-alert');
            if (alert) {
                // Bootstrap fade-out
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
    }, 3000);
</script>
@endpush


@endsection
