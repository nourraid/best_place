@extends('front_site.layout.master')

@section('content')

    <section class="w3l-servicesblock w3l-servicesblock1 py-5" id="progress">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-5 pe-lg-5">
                    <h5 class="title-subw3hny mb-1">Progress Bars</h5>
                    <h3 class="title-w3l">Property Status </h3>
                    <p class="mt-md-4 mt-3">
                        Percentage of available, waiting and completed properties
                        Available: for which you can apply
                        waiting: which has been applied for and is awaiting approval, and you can apply for it
                        Completed: Those that have been submitted and approved and that you cannot apply for
                    </p>

                </div>
                <div class="col-lg-6 align-self pe-lg-4">
                    <div class="progress-info info1">
                        <h6 class="progress-tittle"> Available <span class="">{{count($notReserveProperty)/count($properties)*100}}%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width:{{count($notReserveProperty)/count($properties)*100}}%" aria-valuenow="{{count($notReserveProperty)/count($properties)*100}}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info2">
                        <h6 class="progress-tittle"> Waiting <span class="">{{count($waiting_properties)/count($properties)*100}}%</span>
                        </h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width:{{count($waiting_properties)/count($properties)*100}}%" aria-valuenow="{{count($waiting_properties)/count($properties)*100}}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info3">
                        <h6 class="progress-tittle"> Completed <span class="">{{count($completed_properties)/count($properties)*100}}%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{count($completed_properties)/count($properties)*100}}%" aria-valuenow="{{count($completed_properties)/count($properties)*100}}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>



    <div class="w3l-faq-block py-5" id="faq">
        <div class="container content-gd py-lg-5">
            <div class="row mt-3">
                <div class="col-lg-6 faqw3-right pe-lg-5">
                    <div class="faqw3content text-left">
                        <h6 class="title-subw3hny mb-1 text-left">Ask by Client</h6>
                        <h3 class="title-w3l mb-2">Frequently Asked Questions</h3>
                    </div>
                    <p class="mb-3"> The most important and most common questions asked by customers and visitors to the site </p>
                    <img src="assets/images/banner3.jpg" alt="" class="img-fluid radius-image">

                </div>
                <div class="col-lg-6 faqw3-left">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    01. What services does the site provide?
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    a. The possibility of displaying your property for sale.<hr/>
                                    B. The possibility of applying to reserve a property.<hr/>
                                    c. The site provides the best real estate at the best prices and details, based on your requests.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    02. How can I create an account on the site?
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Click on the Create an account button from the main menu,
                                    you will be taken to a page to fill in your data,
                                    then press the Create button,
                                    and then you can log in as a customer of that site
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    03. How can I reserve a property?
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    After describing the properties,
                                    you can click on the property to open the property details,
                                    and then click on the Reservation button.
                                    Your request will be registered and then wait for approval by the property owner on your personal page.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <section class="w3l-stats-section py-5" id="stats">
        <div class="container py-md-4">
            <div class="w3l-stats-inner-inf">
                <div class="row stats-con">
                    <div class="col-lg-3 col-6 stats_info counter_grid">
                        <p class="counter"> {{count($completed_properties)}} </p>
                        <h3>Completed Properties</h3>
                    </div>
                    <div class="col-lg-3 col-6 stats_info counter_grid">
                        <p class="counter">{{count($users)}} </p>
                        <h3>All Clients</h3>
                    </div>
                    <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-4">
                        <p class="counter">{{count($properties)}} </p>
                        <h3>All Property</h3>
                    </div>
                    <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-4">


{{--                        <p class="counter">{{array_sum($rates)/count($rates)}}</p>--}}

                        <h3>Rating Avg</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>

<section class="w3l-join-main py-5">
        <div class="container py-md-5">
            <div class="w3l-project-in">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="bottom-info">
                            <div class="header-section">
                                <h6 class="title-subw3hny mb-lg-2">Let’s Take a Tour </h6>
                                <h3 class="title-w3l two mb-2">Search Property Smarter,
                                    Quicker & Anywhere
                                </h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 align-self mt-lg-0 mt-3">
                        <p>
                            Best Place is real estate marketplace that allows users to search for homes, apartments, and rental properties. It provides comprehensive property listings, including photos, prices, property details, and virtual tours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="w3l-team-main team py-5" id="team">
    <div class="container py-lg-5">
        <div class="title-content text-center mb-2">
            <h6 class="title-subw3hny mb-1">Our Team</h6>
            <h3 class="title-w3l">Who We Are.</h3>
        </div>
        <div class="row team-row justify-content-center">
            <div class="col-lg-3 col-6 team-wrap mt-lg-5 mt-4">
                <div class="team-member text-center" >
                    <div class="team-img">
                        <img style="height: 450px;" src="{{asset('images/team/nour_shalayle.jpg')}}" alt="" class="radius-image">
                        <div class="overlay-team">
                            <div class="team-details text-center">
                                <div class="socials mt-20">
                                    <a target="_blank" href="https://www.facebook.com/noor.esam.965">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                    <a target="_blank" href="https://twitter.com/nour_shalayel">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                    <a target="_blank" href="https://www.linkedin.com/in/nour-shalayel">
                                        <span class="fab fa-linkedin-in"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#url" class="team-title">Nour Shalayel</a>
                    <p>Backend Developer</p>
                </div>
            </div>
            <!-- end team member -->
            <div class="col-lg-3 col-6 team-wrap mt-lg-5 mt-4">
                <div class="team-member text-center">
                    <div class="team-img">
                        <img  style="height: 450px;" src="{{asset('images/team/nour_shaheen.jpg')}}" alt="" class="radius-image">
                        <div class="overlay-team">
                            <div class="team-details text-center">
                                <div class="socials mt-20">
                                    <a target="_blank"  href="https://www.facebook.com/profile.php?id=100077335862215&mibextid=ZbWKwL">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                    <a target="_blank"  href="https://twitter.com/noursha01800106?t=oGoXvVEurxFDxFfsLb4JLQ&s=09">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                    <a target="_blank" href="https://www.linkedin.com/in/nour-shaheen-384b9b18b">
                                        <span class="fab fa-linkedin-in"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#url" class="team-title">Nour Shaheen</a>
                    <p>BackEnd Developer</p>
                </div>
            </div>
            <!-- end team member -->
            <div class="col-lg-3 col-6 team-wrap mt-lg-5 mt-4">
                <div class="team-member text-center">
                    <div class="team-img">
                        <img  style="height: 450px;" src="assets/images/team3.jpg" alt="" class="radius-image">
                        <div class="overlay-team">
                            <div class="team-details text-center">
                                <div class="socials mt-20">
                                    <a href="#url">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                    <a href="#url">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                    <a href="#url">
                                        <span class="fab fa-linkedin-in"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#url" class="team-title">Taqwa Ahmad</a>
                    <p>UI UX Designer</p>

                </div>
            </div>
            <!-- end team member -->
            <div class="col-lg-3 col-6 team-wrap mt-lg-5 mt-4">
                <div class="team-member text-center">
                    <div class="team-img">
                        <img   style="height: 450px;" src="assets/images/team3.jpg" alt="" class="radius-image">
                        <div class="overlay-team">
                            <div class="team-details text-center">
                                <div class="socials mt-20">
                                    <a href="#url">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                    <a href="#url">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                    <a href="#url">
                                        <span class="fab fa-linkedin-in"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#url" class="team-title">Maram Rouga</a>
                    <p>UI UX Designer</p>

                </div>
            </div>

            <!-- end team member -->
        </div>

    </div>
</section>
@endsection

@section('title')
    About Us
@endsection
