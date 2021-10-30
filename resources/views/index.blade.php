<x-frontend-layout>

    <!-- HOME -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Let's make your life happier</h3>
                                <h1>Healthy Living</h1>
                                <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Doctors</a>
                            </div>
                        </div>
                    </div>

                    <div class="item item-second">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Aenean luctus lobortis tellus</h3>
                                <h1>New Lifestyle</h1>
                                <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                            </div>
                        </div>
                    </div>

                    <div class="item item-third">
                        <div class="caption">
                            <div class="col-md-offset-1 col-md-10">
                                <h3>Pellentesque nec libero nisi</h3>
                                <h1>Your Health Benefits</h1>
                                <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read Stories</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Your <i class="fa fa-h-square"></i>ealth Center</h2>
                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <p>Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi vitae velit volutpat venenatis.</p>
                            <p>Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut placerat, diam a tempus vehicula.</p>
                        </div>
                        <figure class="profile wow fadeInUp" data-wow-delay="1s">
                            <img src="images/author-image.jpg" class="img-responsive" alt="">
                            <figcaption>
                                <h3>Dr. Neil Jackson</h3>
                                <p>General Principal</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- NEWS -->
    @php
        $amount = 0;
        $user_id = null;
        $appointment_id = null;
    @endphp
    @if($lastAppointment)
         @php
            $amount = $lastAppointment->cost;
            $user_id = $lastAppointment->users_id;
            $appointment_id = $lastAppointment->id;
        @endphp
        <section id="news" data-stellar-background-ratio="2.5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2>Unpaid Appointment</h2>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6">
                        <!-- NEWS THUMB -->
                        <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <a href="news-detail.html">
                                <img src="images/news-image1.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info">
                                {{-- <span>March 08, 2018</span> --}}
                                <span>Appoint Time: {{$lastAppointment->appointment_date}}</span>
                                <h3><b>Status:</b> Confirmed</h3>
                                <p>Amount:{{$lastAppointment->cost}}</p>
                                <div class="author">
                                    {{-- <img src="images/author-image.jpg" class="img-responsive" alt=""> --}}
                                    <div class="author-info" id="hijihi">
                                        <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                                token="if you have any token validation"
                                                postdata=""
                                                order="If you already have the transaction generated for current order"
                                                endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- MAKE AN APPOINTMENT -->
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                </div>

                <div class="col-md-6 col-sm-6">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="{{ route('userappointment.store') }}">
                    @csrf
                    <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Make an appointment</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            {{-- <div class="col-md-6 col-sm-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                            </div> --}}

                            <div class="col-md-6 col-sm-6">
                                <label for="date">Select Date</label>
                                <input type="date" name="date" value="" class="form-control">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="select">Select Lab Test</label>
                                <select class="form-control" name="lab_test_ids[]" multiple>
                                    @foreach($labtests as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                {{-- <label for="telephone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                <label for="Message">Additional Message</label>
                                <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea> --}}
                                <button type="submit" class="form-control" id="cf-submit">Submit Button</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <x-slot name="scripts">
        <script>
            var amount = {!! $amount !!}
            var user_id = {!! $user_id !!}
            var appointment_id = {!! $appointment_id !!}
            var obj = {};
            obj.cus_name = $('#customer_name').val();
            obj.cus_phone = $('#mobile').val();
            obj.cus_email = $('#email').val();
            obj.cus_addr1 = $('#address').val();
            // obj.amount = $('#total_amount').val();
            obj.amount = amount;
            obj.user_id = user_id;
            obj.appointment_id = appointment_id;

            $('#sslczPayBtn').prop('postdata', obj);

            (function (window, document) {
                var loader = function () {
                    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                    // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                    script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                    tag.parentNode.insertBefore(script, tag);
                };

                window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            })(window, document);
        </script>
    </x-slot>

</x-frontend-layout>

{{--
<x-guest-layout>
    <x-slot name="links"></x-slot>
    <x-slot name="scripts"></x-slot>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/backend') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @endauth
        </div>
    </div>
</x-guest-layout>
--}}
