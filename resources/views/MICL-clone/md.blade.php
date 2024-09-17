@extends('layouts.frontendLayouts')

@section('frontendLayoutsYeild')
    <!-- md-profile Start -->
    @forelse ($mdData as $md)
        <div class="container" style="display: flex; flex-direction: column;">
            <div class="row first-row" style="display: flex; width: 100%;">
                <!-- Image column -->
                <div class="col image-column" style="flex-basis: 30%;">
                    <img src="{{ asset($md->image_url) }}" alt="Image"
                        style="display: block; width: 100%; height: auto;" />
                </div>

                <!-- Text column -->
                <div class="col text-column" style="flex-basis: 70%; display: flex; flex-direction: column;">
                    <div class="text-content" id="textContent"
                        style="overflow: hidden; max-height: 100%; text-align: justify;">
                        <ul style="list-style-type: none;">
                            <li>
                                <h1>{{ $md->name }}</h1>
                            </li>
                            <li>
                                <div class="ms-3">
                                    <h6 class="text-primary mb-1">MEB Industrial Complex Ltd.</h6>
                                    <small>Managing Director</small>
                                </div>
                            </li>
                        </ul>

                        <p>
                            {!! $md->description !!} 
                        </p>
                    </div>
                </div>
            </div>

            <!-- Overflow text row -->
            <div class="row second-row" style="margin-top: 10px;">
                <div class="col overflow-column" id="overflowColumn" style="word-break: break-word; text-align: justify;">
                    <!-- Overflow text will appear here -->
                </div>
            </div>
        </div>
    @empty
        <div class="container" style="display: flex; flex-direction: column;">
            <div class="row first-row" style="display: flex; width: 100%;">
                <!-- Image column -->
                <div class="col image-column" style="flex-basis: 30%;">
                    <img src="{{ asset('frontend/img/MEB/md_profile.JPG') }}" alt="Image"
                        style="display: block; width: 100%; height: auto;" />
                </div>

                <!-- Text column -->
                <div class="col text-column" style="flex-basis: 70%; display: flex; flex-direction: column;">
                    <div class="text-content" id="textContent"
                        style="overflow: hidden; max-height: 100%; text-align: justify;">
                        <ul style="list-style-type: none;">
                            <li>
                                <h1>Mr. Mohammed Shouib</h1>
                            </li>
                            <li>
                                <div class="ms-3">
                                    <h6 class="text-primary mb-1">MEB Industrial Complex Ltd.</h6>
                                    <small>Managing Director</small>
                                </div>
                            </li>
                        </ul>

                        <p>
                            Mr. Mohammed Shouib is a highly motivated, enthusiastic, and natural visionary entrepreneur was
                            born on 6th August 1981in Chittagong. He is the oldest grandson of the legendary businessman of
                            Bangladesh Late Mr. Mohammed Elias and the son of Mr. Mohammed Shamsul Alam. Mr. Mohammed
                            Shamsul Alam is also a renowned businessman who has successfully handed over the business to Mr.
                            Mohammed Shouib. He has surrounded himself with our country’s business leaders and successful
                            individuals from a very young age. He was the youngest director in the history of Chittagong
                            Chamber of Commerce and Industries as well as the youngest member of The Federation of
                            Bangladesh Chambers of Commerce and Industry (FBCCI). He has completed his BBA Degree from San
                            Jose State University, California, USA to develop himself in the field of the business arena.
                            After completing his BBA he has returned to Bangladesh and started his business as a Managing
                            Director of the MEB Industrial Complex Ltd. which is a manufacturing and service-oriented
                            industry of Edible Oil, In a short period, he has successfully established another new companies
                            named Nahar Holdings Ltd. Which is ventured into the real estate sector. His enthusiasm,
                            dedication, dynamic, and foreseeing leadership carry all his ventures quite smoothly and
                            successfully. His highly visionary ambition is not over yet and aims to invest in the various
                            profitable ventures as well as public welfare sectors in near future. He has developed a strong
                            and high-level international network of business relationship to develop business in Bangladesh.
                            All in all his true vision is; to serve with integrity, quality that adds values to his
                            countrymen and thus helping the economy and the standards’ of human life. Religion, discipline,
                            healthy life, family values and dedications are his motto of life. With respect and good
                            communications, he believes everything is possible. Since we all have one life to live, all
                            possibilities should be exercised.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Overflow text row -->
            <div class="row second-row" style="margin-top: 10px;">
                <div class="col overflow-column" id="overflowColumn" style="word-break: break-word; text-align: justify;">
                    <!-- Overflow text will appear here -->
                </div>
            </div>
        </div>
    @endforelse
    <!-- md-profile End -->
    @push('md_content')
    <script>
            document.addEventListener("DOMContentLoaded", function () {
            const image = document.querySelector(".image-column img");
            const textContent = document.getElementById("textContent");
            const overflowColumn = document.getElementById("overflowColumn");

            image.onload = function () {
                const imageHeight = image.clientHeight;

                // Set max height for the text content based on image height
                textContent.style.maxHeight = imageHeight + "px";

                // Clone the content to manipulate overflow separately
                const fullContent = textContent.innerHTML;

                // Temporarily set overflow to hidden to check for scrolling
                textContent.style.overflow = "hidden";

                // Check if the text is overflowing
                if (textContent.scrollHeight > textContent.clientHeight) {
                    let visibleContent = fullContent;

                    // Shorten the content until it fits within the image height
                    while (textContent.scrollHeight > textContent.clientHeight) {
                        visibleContent = visibleContent.substring(0, visibleContent.length - 1);
                        textContent.innerHTML = visibleContent + "...";
                    }

                    // Put the remaining text in the overflow column
                    const remainingContent = fullContent.substring(visibleContent.length);
                    overflowColumn.innerHTML = remainingContent.trim();
                }
            };
        });

    </script>
    @endpush
@endsection
