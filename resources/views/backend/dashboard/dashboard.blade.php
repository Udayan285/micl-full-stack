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
            @role(['admin','moderator'])
            <div class="row g-4">
                <h1 style="color: #009CFF; text-align:center">
                    Hello! Welcome to MICL dashboard. From your account dashboard you can view your all details and
                    create,read,update,delete and manage your all business activities, and edit your password and account
                    details.
                </h1>
            </div>
            @endrole

            @if(!Auth::user()->hasAnyRole(['admin', 'moderator']))
            <div class="row g-4">
                <h1 style="color: #009CFF; text-align:center">
                    Hello! Welcome to MICL dashboard. From your account dashboard you can view your details and edit your password and account
                    details.
                </h1>
            </div>
            @endif

        </div>
        <!-- Sales Chart End -->
    </div>
    <!-- Content End -->
    <script>
        // Set timeout to hide the alert after 3 seconds
        setTimeout(function() {
            var alert = document.getElementById('status-alert');
            if (alert) {
                // Bootstrap fade-out
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 3000);
    </script>
@endsection
