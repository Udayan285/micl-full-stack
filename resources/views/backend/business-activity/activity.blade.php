@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
              {{-- Success message show here via alert --}}
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" id="status-alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

            {{-- activiy section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Activity - Title,Description & Images</h6>
                    <form action="{{ route('dashboard.activityStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleInputTitle" class="form-label">Activity - Title</label>
                        <div class="mb-3">     
                            <input type="text" name="activity_title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('activity_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Activity - Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="activity_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('activity_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Activity - Image</label>
                        <div class="mb-3">     
                            <input type="file" name="activity_image" class="form-control" id="activity_image" aria-describedby="emailHelp">  
                        </div>
                        @error('activity_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="activity_image_main"  src="" style="height: 100px; width:100px;" alt="Business Activity Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- activity section endss --}}


            {{-- activity section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Business Activity Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Business Activity Headline</th>
                                <th scope="col">Business Activity Description</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($activities as $key=>$data)                                                                         
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $data->title }}</td>
                                <td>{!! $data->description !!}</td>
                                <td>
                                    <img src="{{ asset($data->image_url) }}" alt="Business Activity Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                   
                                    <form action="{{ route('dashboard.activityActive',$data->slug) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $data->status == 0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $data->status == 0 ? 'Active' : 'Deactive' }}</button>
                                       
                                    </form>
                                    
                                    <form action="{{ route('dashboard.activityEdit',$data->slug) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.activityRemove',$data->slug) }}" method="POST">
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
            {{--activity section show table ends--}}

        
        </div>
    </div>       
</div>

{{-- Custom javascript here for media upload --}}
@push('homeAboutImage')
<script>
    let uploadImg = document.querySelector('#activity_image')
    let display = document.querySelector('#activity_image_main')
    
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
