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

            {{-- area section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Contact - Location,Email,Phone</h6>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                       
                        <label for="exampleInputDescription" class="form-label">Contact Location</label>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="contact_location" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>                          
                        </div>
                        @error('contact_location')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputTitle" class="form-label">Contact - Email</label>
                        <div class="mb-3 ">     
                            <input type="text" name="contact_email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('contact_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputTitle" class="form-label">Contact - Phone</label>
                        <div class="mb-3">     
                            <input type="text" name="contact_phone"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('contact_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- area section endss --}}


            {{-- area section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Area Page Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Area Headline</th>
                                <th scope="col">Area Description</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @foreach ($areas as $key=>$area) --}}
                                
                                           
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td>
                                    <img src="" alt="Area Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                   
                                    <form action="" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-warning btn-sm mt-2">Active</button>
                                       
                                    </form>
                                    
                                    <form action="" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form>
                                    
                                </td>
                               
                            </tr>  
                            {{-- @endforeach  --}}

                                                                         
                        </tbody>
                    </table>
                </div>
            </div>
            {{--area section show table ends--}}

        
        </div>
    </div>       
</div>


{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#area_image')
    let display = document.querySelector('#area_image_main')
    
    function imgPreviewer(event){
        let url = URL.createObjectURL(event.target.files[0])
        display.src = url
    }
    uploadImg.addEventListener('change',imgPreviewer);
</script>
@endpush


@endsection