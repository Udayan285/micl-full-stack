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

            {{-- footer section starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Footer - Get In Touch</h6>
                    <form action="{{ route('dashboard.footerStore') }}" method="POST">
                        @csrf

                        {{-- corporate office --}}
                        <label for="exampleInputDescription" class="form-label">Corporate Office</label>
                        <div class="form-floating">
                            <textarea class="form-control summernote" name="corporate_office" 
                                id="" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('corporate_office')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- micl sales office --}}
                        <label for="exampleInputDescription" class="form-label">MICL Sales Office</label>
                        <div class="form-floating">
                            <textarea class="form-control summernote" name="sales_office" 
                                id="" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('sales_office')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- factory --}}
                        <label for="exampleInputDescription" class="form-label">Factory</label>
                        <div class="form-floating">
                            <textarea class="form-control summernote" name="factory" 
                                id="" style="height: 150px;" ></textarea>
                            
                        </div>
                        @error('factory')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        

                        <button type="submit" class="btn btn-primary mt-3">Add Now</button>
                    </form>
                </div>
            </div>
            {{-- footer section endss --}}


            {{-- footer section show table starts --}}
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Get In Touch Information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Corporate Office</th>
                                <th scope="col">MICL - Sales office</th>
                                <th scope="col">Factory</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($footers as $key=>$footer)
                                
                                           
                            <tr>
                                <th scope="row">{{ ++$key }}</th>                               
                                <td>{!! $footer->corporate_office !!}</td>                            
                                <td>{!! $footer->sales_office !!}</td>                       
                                <td>{!! $footer->factory !!}</td>
                                <td>
                                   
                                    <form action="{{ route('dashboard.footerActive',$footer->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-{{ $footer->status==0 ? 'warning' : 'success' }} btn-sm mt-2">{{ $footer->status ==0 ? 'Active' : 'Deactive' }}</button>                                                                   
                                    </form>
                                    
                                    <form action="{{ route('dashboard.footerEdit',$footer->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Edit</button>
                                    </form>
                                   
                                    <form action="{{ route('dashboard.footerRemove',$footer->id) }}" method="POST">
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
            {{--footer section show table ends--}}

        
        </div>
    </div>       
</div>

@endsection
