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

            {{-- edit contact section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update - Location,Email,Phone</h6>
                    <form action="{{ route('dashboard.contactUpdate',$contactEdit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputDescription" class="form-label">Edit Contact Location</label>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="contact_location" placeholder=""
                                id="summernote" style="height: 150px;" >{{ $contactEdit ? $contactEdit->contact_location : '' }}</textarea>                          
                        </div>
                        @error('contact_location')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputTitle" class="form-label">Edit Contact - Email</label>
                        <div class="mb-3 ">     
                            <input type="text" name="contact_email" value="{{ $contactEdit ? $contactEdit->contact_email : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('contact_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <label for="exampleInputTitle" class="form-label">Edit Contact - Phone</label>
                        <div class="mb-3">     
                            <input type="text" name="contact_phone" value="{{ $contactEdit ? $contactEdit->contact_phone : '' }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
                        </div>
                        @error('contact_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </form>
                </div>
            </div>
            {{-- edit contact section endss --}}
        
        </div>
    </div>       
</div>




@endsection