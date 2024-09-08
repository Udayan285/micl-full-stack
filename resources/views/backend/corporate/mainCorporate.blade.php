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

            {{-- corporate vision page section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Corporate Vision Page Title,Description & Images</h6>
                    <form action="{{ route('dashboard.corpoStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <label for="exampleInputTitle" class="form-label">Corporate Page Corporate Title</label>
                        <div class="mb-3">     
                            <input type="text" name="corporate_title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('corporate_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Corporate Page Corporate Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="corporate_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>
                            
                        </div>

                        @error('corporate_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Corporate Page Corporate Images</label>
                        <div class="mb-3">     
                            <input type="file" name="corporate_image" class="form-control" id="imageFile" aria-describedby="emailHelp">  
                        </div>
                        @error('corporate_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <img id="corporateImage"  src="" style="height: 100px; width:100px;" alt="corporate image">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- corporate vision page section ends --}}


            {{-- corporate vision page section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Corporate Vision page information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Corporate Headline</th>
                                <th scope="col">Corporate Description</th>
                                <th scope="col">Corporate Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                           @foreach ($mainCorporateData as $key=>$data)
                               
                           
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $data->title }}</td>
                                <td>{!! $data->description !!}</td>
                                <td>
                                    <img src="{{ asset('corporates/'.$data->image_url) }}" alt="Corporate Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                   
                                    <form action="{{ route('dashboard.corpoActive',$data->slug) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $data->status == 0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $data->status == 0 ? 'Active' : 'Deactive' }}</button>
                                    </form>
                                    
                                    <form action="{{ route('dashboard.corpoEdit',$data->slug) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.corpoRemove',$data->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                    </form>
                                    
                                </td>
                               
                            </tr>  
                            @endforeach
                                                  
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- corporate vision page section show table ends--}}

        </div>
    </div>       
</div>

@push('imgviewmaincorporate')
<script>
    let uploadImg = document.querySelector('#imageFile')
    let display = document.querySelector('#corporateImage')
    
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
