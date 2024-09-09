@extends('layouts.backendLayouts')

@section('backendLayoutsPart')

<div class="container mt-2 mb-2">
 
  
  <div style="display: flex; justify-content: flex-end;">
    <a href="{{ route('dashboard.superOil') }}"><button class="btn btn-sm btn-primary mt-3">Back</button></a>
  </div>
   {{-- Success message show here via alert --}}
   @if (session('status'))
   <div class="alert alert-success alert-dismissible fade show" id="status-alert" role="alert">
         <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif

  <h3 id="description">All Super Oil Refinery & Dry fractionation Unit </h3>

  <div class="table-responsive">
    <table class="table table-bordered border-primary">
        
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Year of Establishment</th>
            <th scope="col">Plant Manufacturer</th>
            <th scope="col">Country of Origin</th>
            <th scope="col">Prime Raw Material</th>
            <th scope="col">Product</th>
            <th scope="col">Existing Capacity</th>
            <th scope="col">Utility Requirement</th>
            <th scope="col">Manpower Requirement</th>
            <th scope="col">Images</th>
            <th scope="col">Actions</th>
            
            </tr>
        </thead>

        <tbody>
            @foreach($superAll as $key=> $data)
            <tr>
              <th scope="row">{{ ++$key }}</th>
              <td>{{ $data->year_establishment }}</td>
              <td>{{ $data->plant_manufacturer }}</td>
              <td>{{ $data->country_origin }}</td>
              <td>{{ $data->prime_raw_material }}</td>
              <td>{{ $data->product }}</td>
              <td>{{ $data->existing_capacity }}</td>
              <td>{{ $data->utility_requirement }}</td>
              <td>{{ $data->manpower_requirement }}</td>
             
              
              {{-- images --}}
              <td>
                    @php
                        $images = explode('|', $data->images);
                    @endphp
                    {{-- forloop for images --}}
                    @foreach($images as $image)
                    <img src="{{ asset($image) }}" class="mb-1" alt="Image" style="height:50px; width:50px;">
                    @endforeach                  
                
              </td>

              <td>
                
                <form action="{{ route('dashboard.editSuper',$data->id) }}" method="GET">
                  @csrf
                  <button type="submit" class="btn btn-sm mb-1 btn-primary">Edit</button>
                </form>

                <form action="{{ route('dashboard.removeSuper',$data->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm mb-1 btn-danger">Delete</button>
                </form>
               
                <form action="{{ route('dashboard.activeSuper',$data->id) }}" method="POST">
                  @csrf
                  @method("PUT")
                  <button type="submit" class="btn btn-sm mb-1 btn-{{ $data->status == 0 ? 'warning' : 'success' }}">{{ $data->status == 0 ? 'Active' : 'Deactive' }}</button>
                </form>

              </td>
              
            </tr>
            @endforeach
        </tbody>
        
    </table>
  </div>
 
</div>

<script>
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

@endsection