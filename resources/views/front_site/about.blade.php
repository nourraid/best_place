@extends('front_site.layout.master')
@section('content')

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
                        <p class="counter">{{array_sum($rates->toArray())/count($rates)}}</p>

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
                <div class="team-member text-center">
                    <div class="team-img">
                        <img src="assets/images/team1.jpg" alt="" class="radius-image">
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
                    <a href="#url" class="team-title">Nour Shalayel</a>
                    <p>Backend Developer</p>
                </div>
            </div>
            <!-- end team member -->
            <div class="col-lg-3 col-6 team-wrap mt-lg-5 mt-4">
                <div class="team-member text-center">
                    <div class="team-img">
                        <img src="assets/images/team2.jpg" alt="" class="radius-image">
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
                    <a href="#url" class="team-title">Nour Shaheen</a>
                    <p>Frontend Developer</p>
                </div>
            </div>
            <!-- end team member -->
            <div class="col-lg-3 col-6 team-wrap mt-lg-5 mt-4">
                <div class="team-member text-center">
                    <div class="team-img">
                        <img src="assets/images/team3.jpg" alt="" class="radius-image">
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
            <div class="col-lg-3 col-6 team-wrap mt-lg-5 mt-4">
                <div class="team-member text-center">
                    <div class="team-img">
                        <img src="assets/images/team3.jpg" alt="" class="radius-image">
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
