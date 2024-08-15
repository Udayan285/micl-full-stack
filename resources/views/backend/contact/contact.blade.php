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

            {{-- contact section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Contact - Location,Email,Phone</h6>
                    <form action="{{ route('dashboard.contactStore') }}" method="POST" enctype="multipart/form-data">
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
                            <textarea class="form-control summernote" name="contact_email" placeholder="Leave a description here"
                                id="" style="height: 150px;" ></textarea>      
                            
                        </div>
                        @error('contact_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputTitle" class="form-label">Contact - Phone</label>
                        <div class="mb-3">     
                            <textarea class="form-control summernote" name="contact_phone" placeholder="Leave a description here"
                                id="" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('contact_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <button type="submit" class="btn btn-primary">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- contact section endss --}}


            {{--  contact section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Contact Page Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Contact Location</th>
                                <th scope="col">Contact Email</th>
                                <th scope="col">Contact Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($contacts as $key=>$contact)
                                
                                           
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{!! $contact->contact_location !!}</td>
                                <td>{!! $contact->contact_email !!}</td>
                                <td>{!! $contact->contact_phone !!}</td>
                              
                                <td>
                                   
                                    <form action="{{ route('dashboard.contactActive',$contact->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $contact->status == 0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $contact->status == 0 ? 'Active' : 'Deactive' }}</button> 
                                    </form>
                                    
                                    <form action="{{ route('dashboard.contactEdit',$contact->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.contactRemove',$contact->id) }}" method="POST">
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
            {{--contact section show table ends--}}

        
        </div>
    </div>       
</div>


@endsection