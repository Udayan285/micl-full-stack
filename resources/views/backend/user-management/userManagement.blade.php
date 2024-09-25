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
            
             <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Users related all information...</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $user->first_name." ".$user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                
                                <td>
                                    <img src="{{ asset($user->image_url) }}" alt="user-image" style="height: 80px;width:90px;">
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.removeUser',$user->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr> 
                            @endforeach            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
