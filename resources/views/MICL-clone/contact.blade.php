@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')

      <!-- Contact Start -->
      <div class="container-xxl py-5">
        <div class="container">
          <div
            class="text-center mx-auto mb-5 wow fadeInUp"
            data-wow-delay="0.1s"
            style="max-width: 600px"
          >
            <h1 class="mb-3">Get In Touch</h1>
          </div>
          
          @foreach ($contact as $data)
          <div class="row g-4 mb-5">
            <div
              class="col-md-6 col-lg-4 text-center wow fadeInUp"
              data-wow-delay="0.1s"
            >
              <div
                class="rounded-circle d-inline-flex align-items-center justify-content-center mb-4 primaryBg"
                style="width: 75px; height: 75px"
              >
                <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
              </div>
              <h6 class="locat-content">{!! $data->contact_location !!}</h6>
            </div>
            <divs
              class="col-md-6 col-lg-4 text-center wow fadeInUp"
              data-wow-delay="0.3s"
            >
              <div
                class="primaryBg rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                style="width: 75px; height: 75px"
              >
                <i class="fa fa-envelope-open fa-2x text-primary"></i>
              </div>
              <h6>{!! $data->contact_email !!}</h6>
            </divs>
            <div
              class="col-md-6 col-lg-4 text-center wow fadeInUp"
              data-wow-delay="0.5s"
            >
              <div
                class="primaryBg rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                style="width: 75px; height: 75px"
              >
                <i class="fa fa-phone-alt fa-2x text-primary"></i>
              </div>
              <h6>{!! $data->contact_phone !!}</h6>
            </div>
          </div>
          @endforeach
        


          <div class="primaryBg rounded">
            <div class="row g-0">
              <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div
                  class="h-100 d-flex flex-column justify-content-center p-5"
                >
                  <p class="mb-4">
                    Make appointment and connect.
                  </p>

                   {{-- Success message show here via alert --}}
                  @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  {{-- failed message show here via alert --}}
                  @if (session('fail'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>{{ session('fail') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                 
                 
                 {{-- email part start here --}}
                  <form action="{{ route('sendEmail') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                      <div class="col-sm-6">
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating">
                          <input
                            name="name"
                            type="text"
                            class="form-control border-0"
                            id="name"
                            placeholder="Your Name"
                          />
                          {{-- <label for="name">Your Name</label> --}}
                        </div>
                      </div>
                      <div class="col-sm-6">
                        @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating">
                          <input                          
                            name="email"
                            type="email"
                            class="form-control border-0"
                            id="email"
                            placeholder="Your Email"
                          />
                          {{-- <label for="email">Your Email</label> --}}
                        </div>
                      </div>
                      <div class="col-12">
                        @error('subject')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating">
                          <input
                            name="subject"
                            type="text"
                            class="form-control border-0"
                            id="subject"
                            placeholder="Subject"
                          />
                          {{-- <label for="subject">Subject</label> --}}
                        </div>
                      </div>
                      <div class="col-12">
                        @error('message')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-floating">
                          <textarea
                            name="message"
                            class="form-control border-0"
                            placeholder="Leave a message here"
                            id="message"
                            style="height: 100px"
                          ></textarea>
                          {{-- <label for="message">Message</label> --}}
                        </div>
                      </div>
                      <div class="col-12">
                        <button
                          class="btn btn-primary w-100 py-3"
                          type="submit"
                        >
                          Send Message
                        </button>
                      </div>
                    </div>
                  </form>
                  {{-- email part end here --}}


                </div>
              </div>
              <div
                class="col-lg-6 wow fadeIn"
                data-wow-delay="0.5s"
                style="min-height: 400px"
              >
                <div class="position-relative h-100">
           
                  <iframe
                    class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29538.79250164157!2d91.77279471181897!3d22.264763467686066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acde52b388c72b%3A0xd72f815d25bad54b!2s40%20No.%20North%20Patenga%20Ward%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1717651846941!5m2!1sen!2sbd"
                    frameborder="0"
                    style="min-height: 400px; border: 0"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0"
                  ></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Contact End -->
@endsection
