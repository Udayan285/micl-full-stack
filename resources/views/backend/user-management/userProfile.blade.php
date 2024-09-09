@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <img src="{{ asset('about-us/1723729575.jpg') }}" 
                             class="rounded-circle mb-3" 
                             alt="profile-picture" 
                             style="height: 150px; width:150px;">
                        <h3 class="card-title mb-1">Udayan Profile</h3>
                        <p>Email: <a href="mailto:udayan@gmail.com">udayan@gmail.com</a></p>
                        <p>Phone: <a href="tel:+8801319037021">+8801319037021</a></p>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('dashboard.editUserProfile',Auth::id()) }}" class="btn btn-primary me-2">
                                Edit Profile
                            </a> 
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">About Me</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection     

            