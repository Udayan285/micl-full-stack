@extends('layouts.backendLayouts')

@section('backendLayoutsPart')

<!-- Content Start -->
<div class="content">
            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                {{-- Success message show here via alert --}}
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="status-alert">
                <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                @endif
                <div class="row g-4">
                    <h1 style="color: #009CFF; text-align:center">
                        Hello! Welcome to MICL dashboard. From this dashboard you can create,read,update,delete your all articles,images and etc.
                    </h1>

                    {{-- <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div> --}}
                    
                </div>
            </div>
            <!-- Sales Chart End -->
</div>
<!-- Content End -->
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
