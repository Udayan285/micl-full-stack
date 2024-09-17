@extends('layouts.backendLayouts')

@section('backendLayoutsPart')
    <div class="content">
        <div class="container-fluid">
            {{-- Success message show here via alert --}}
            @if (session('status'))
                <div id="status-alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert"
                    id="status-alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8 mt-4">
                    <div class="card shadow-lg">
                        <div class="card-body text-center">
                            <img src="{{ asset(auth()->user()->image_url) }}" class="rounded-circle mb-3"
                                alt="profile-picture" style="height: 150px; width:150px;">
                            <h3 class="card-title mb-1">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                            </h3>
                            <p>Email: <a href="{{ auth()->user()->email }}">{{ auth()->user()->email }}</a></p>
                            <p>Phone: <a
                                    href="tel:+88{{ auth()->user()->contact }}">{{ auth()->user()->contact ? auth()->user()->contact : '***' }}</a>
                            </p>

                            {{-- <div class="d-flex justify-content-center">
                            <a href="{{ route('dashboard.editUserProfile',Auth::id()) }}" class="btn btn-primary me-2">
                                Edit Profile
                            </a> 
                        </div> --}}
                        </div>
                    </div>
                </div>

                {{-- This div is for edit info --}}
                <div class="col-md-6 mb-3 mt-4">
                    <div class="card shadow-lg">
                        {{-- user profile edit starts --}}
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Edit - Name,Description,Contact & Image</h6>
                                <form action="{{ route('dashboard.updateUserProfile', Auth::id()) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="exampleInputTitle" class="form-label">First Name</label>
                                    <div class="mb-3">
                                        <input type="text" name="first_name" value="{{ auth()->user()->first_name }}"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    @error('first_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <label for="exampleInputTitle" class="form-label">Last Name</label>
                                    <div class="mb-3">
                                        <input type="text" name="last_name" value="{{ auth()->user()->last_name }}"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <label for="exampleInputTitle" class="form-label">Email</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control"
                                            value="{{ auth()->user()->email }}" placeholder="" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <label for="exampleInputTitle" class="form-label">Contact</label>
                                    <div class="mb-3">
                                        <input type="text" name="contact" value="{{ auth()->user()->contact }}"
                                            placeholder="" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    @error('contact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <label for="exampleInputDescription" class="form-label mt-2">Profile Picture</label>
                                    <div class="mb-3">
                                        <input type="file" name="image"
                                            value="{{ auth()->user()->image_url ? auth()->user()->image_url : '' }}"
                                            class="form-control" id="Profile" aria-describedby="emailHelp">
                                    </div>
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="mb-3">
                                        <img id="profile_picture" src="{{ asset(auth()->user()->image_url) }}"
                                            style="height: 100px; width:100px;" alt="Profile Picture">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </form>
                            </div>
                        </div>
                        {{-- user profile edit ends --}}
                    </div>
                </div>

                {{-- This div is for change password --}}
                <div class="col-md-6 mb-3 mt-4">
                    <div class="card shadow-lg">
                        {{-- user profile edit starts --}}
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Change your password</h6>
                                <form action="{{ route('dashboard.UpdatePassword',auth()->user()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="exampleInputTitle" class="form-label">Current Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="current_password" value=""
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    @error('current_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <label for="exampleInputTitle" class="form-label">New Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="new_password" value="" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    @error('new_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                    <label for="exampleInputTitle" class="form-label">Confirm Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="new_password_confirmation" class="form-control"
                                            value="" placeholder="" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    @error('new_password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </form>
                            </div>
                        </div>
                        {{-- user profile edit ends --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let uploadImg = document.querySelector('#Profile')
        let display = document.querySelector('#profile_picture')

        function imgPreviewer(event) {
            let url = URL.createObjectURL(event.target.files[0])
            display.src = url
        }
        uploadImg.addEventListener('change', imgPreviewer);
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
