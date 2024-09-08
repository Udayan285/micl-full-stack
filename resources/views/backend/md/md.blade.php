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
                    <h6 class="mb-4">Manager - Name,Description & Image</h6>
                    <form action="{{ route('dashboard.mdStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleInputTitle" class="form-label">MD - Name</label>
                        <div class="mb-3">     
                            <input type="text" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">MD - Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">MD - Image</label>
                        <div class="mb-3">     
                            <input type="file" name="image" class="form-control" id="manager_image" aria-describedby="emailHelp">  
                        </div>
                        @error('image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="mb-3">
                            <img id="manager_image_main"  src="" style="height: 100px; width:100px;" alt="MD Image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add MD Profile</button>
                    </form>
                </div>
            </div>
            {{-- md section endss --}}


            {{-- md section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">MD Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">MD Name</th>
                                <th scope="col">MD Description</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($mds as $key=>$md)
                                
                                           
                            <tr>
                                <th scope="row">{{ ++$key }}</th>                               
                                <td>{{ $md->name }}</td>                            
                                <td>{!! $md->description !!}</td>                       
                                <td>
                                    <img src="{{ asset($md->image_url) }}" alt="Manager Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                   
                                    <form action="{{ route('dashboard.mdActive',$md->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $md->status == 0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $md->status == 0 ? 'Active' : 'Deactive' }}</button>
                                        
                                       
                                    </form>
                                    
                                    <form action="{{ route('dashboard.mdEdit',$md->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.mdRemove',$md->id) }}" method="POST">
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
            {{--md section show table ends--}}

        
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
