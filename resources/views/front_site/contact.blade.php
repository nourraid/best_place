@extends('front_site.layout.master')

@section('content')
    <div class="w3l-contact-10 py-5" id="contact">
        <div class="form-41-mian pt-lg-4 pt-md-3 pb-lg-4">
            <div class="container">
                <div class="heading text-center mx-auto">
                    <h5 class="title-subw3hny text-center">Contact our team</h5>
                    <h3 class="title-w3l">Got any <span class="inn-text">Questions? </span></h3>
                </div>

                <div class="contacts-5-grid-main mt-5">
                    <div class="contacts-5-grid">
                        <div class="map-content-5">
                            <div class="d-grid grid-col-2 justify-content-center">
                                <div class="contact-type">
                                    <div class="address-grid">
                                        <span class="fas fa-map-marked-alt"></span>
                                        <h6>Address</h6>
                                        <p> Al-Aqsa University , Public Street, Private Bank,best place,Gaza, Palestine .</p>

                                    </div>
                                    <div class="address-grid">
                                        <span class="fas fa-envelope-open-text"></span>
                                        <h6>Email</h6>
                                        <a href="mailto:nrayd633@gmail.com" class="link1">nrayd633@gmail.com</a>
                                        <a href="mailto:noorshalayle@gmail.com" class="link1">noorshalayle@gmail.com</a>

                                    </div>
                                    <div class="address-grid">
                                        <span class="fas fa-phone-alt"></span>
                                        <h6>Phone</h6>
                                        <a href="tel:+970 592-212-481" class="link1">+970 592-212-481</a>
                                        <a href="tel:+972 59-222-3132" class="link1">+972 59-222-3132</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.layout.masseges')

                <div class="form-inner-cont mt-5">
                    <form action="{{route('send_question')}}" method="post" class="signin-form">
                        @csrf
                        <div class="form-grids">
                            <div class="form-input">
                                <input type="text" name="name" id="w3lName" placeholder="Enter your name *" required="" />
                            </div>
                            <div class="form-input">
                                <input type="text" name="subject" id="w3lSubject" placeholder="Enter subject " required />
                            </div>
                            <div class="form-input">
                                <input type="email" name="email" id="w3lSender" placeholder="Enter your email *" required />
                            </div>
                            <div class="form-input">
                                <input type="text" name="phoneNumber" id="w3lPhone" placeholder="Enter your Phone Number *" required />
                            </div>
                        </div>
                        <div class="form-input">
                            <textarea name="message" id="w3lMessage" placeholder="Type your query here" required=""></textarea>
                        </div>
                        <div class="w3-submit text-right">
                            <button class="btn btn-style btn-primary">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- //contacts-5-grid -->
    </div>

    <div class="contacts-sub-5">
        <iframe src="{{asset('https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3162.3160459525507!2d34.440154!3d31.510897000000003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f418cfa8357%3A0x56d415183481113e!2z2KzYp9mF2LnYqSDYp9mE2KPZgti12Yk!5e1!3m2!1sar!2sus!4v1686942136993!5m2!1sar!2sus')}}" style="border:0" allowfullscreen></iframe>
    </div>
@endsection

@section('title')
    Contact Us
@endsection

