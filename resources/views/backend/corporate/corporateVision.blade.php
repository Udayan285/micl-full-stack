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

            {{-- homepage corporate section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Home Page Corporate Title,Description & Images</h6>
                    <form action="{{ route('dashboard.homeCorpoStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                      

                        <label for="exampleInputTitle" class="form-label">Home Page Corporate Title</label>
                        <div class="mb-3">     
                            <input type="text" name="home_corporate_title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('home_corporate_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                       
                        <label for="exampleInputDescription" class="form-label">Home Page Corporate Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="home_corporate_description" placeholder="Leave a description here"
                                id="summernote" style="height: 150px;" ></textarea>

                        </div>
                        @error('home_corporate_description')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputDescription" class="form-label mt-2">Home Page Corporate Images</label>
                        <div class="mb-3">     
                            <input type="file" name="home_corporate_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('home_corporate_image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- homepage corporate section endss --}}


            {{-- homepage corporate section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Home Page Corporate Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Home Corporate Headline</th>
                                <th scope="col">Home Corporate Description</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($homeCorporateData as $key=>$data)                         
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $data->title }}</td>
                                <td>{!! $data->description !!}</td>
                                <td>
                                    <img src="{{ asset('homecorporate/'.$data->image_url) }}" alt="Home Corporate Image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                   
                                    <form action="{{ route('dashboard.homeCorpoActive',$data->slug) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $data->status == 0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $data->status == 0 ? 'Active' : 'Deactive' }}</button>
                                    </form>
                                    
                                    <form action="{{ route('dashboard.homeCorpoEdit',$data->slug) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.homeCorpoRemove',$data->slug) }}" method="POST">
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
            {{-- homepage corporate section show table ends--}}

        
        </div>
    </div>       
</div>
@endsection
