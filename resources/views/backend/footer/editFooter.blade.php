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

            {{-- edit footer section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update - Get In Touch</h6>
                    <form action="{{ route('dashboard.footerUpdate',$footer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- corporate office --}}
                        <label for="exampleInputDescription" class="form-label">Update - Corporate Office</label>
                        <div class="form-floating">
                            <textarea class="form-control summernote" name="corporate_office" 
                                id="" style="height: 150px;" >{{ $footer ? $footer->corporate_office : '' }}</textarea>
                            
                        </div>
                        @error('corporate_office')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- micl sales office --}}
                        <label for="exampleInputDescription" class="form-label">Update - MICL Sales Office</label>
                        <div class="form-floating">
                            <textarea class="form-control summernote" name="sales_office" 
                                id="" style="height: 150px;" >{{ $footer ? $footer->sales_office : '' }}</textarea>
                            
                        </div>
                        @error('sales_office')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- factory --}}
                        <label for="exampleInputDescription" class="form-label">Update - Factory</label>
                        <div class="form-floating">
                            <textarea class="form-control summernote" name="factory" 
                                id="" style="height: 150px;" >{{ $footer ? $footer->factory : '' }}</textarea>
                            
                        </div>
                        @error('factory')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        

                        <button type="submit" class="btn btn-primary mt-3">Update Now</button>
                    </form>
                </div>
            </div>
            {{--Edit footer section endss --}}


        
        </div>
    </div>       
</div>

@endsection
