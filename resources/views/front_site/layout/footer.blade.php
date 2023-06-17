<footer class="w3l-footer9">
    <section class="footer-inner-main py-5">
        <div class="container py-md-4">
            <div class="right-side">
                <div class="row footer-hny-grids sub-columns">
                    <div class="col-lg-3 sub-one-left">
                        <h6>About </h6>
                        <p class="footer-phny pe-lg-5">Best Place is real estate marketplace that allows users to search for homes, apartments, and rental properties. It provides comprehensive property listings, including photos, prices, property details, and virtual tours.</p>
                        <div class="columns-2 mt-4 pt-lg-2">
                            <ul class="social">
                                <li><a  target="_blank" href="https://www.facebook.com/profile.php?id=100077335862215&mibextid=ZbWKwL"><span class="fab fa-facebook-f"></span></a>
                                </li>
                                <li><a  target="_blank" href="https://www.linkedin.com/in/nour-shaheen-384b9b18b"><span class="fab fa-linkedin-in"></span></a>
                                </li>
                                <li><a  target="_blank" href="https://twitter.com/noursha01800106?t=oGoXvVEurxFDxFfsLb4JLQ&s=09"><span class="fab fa-twitter"></span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 sub-two-right">
                        <h6>Services</h6>
                        <ul>
                            <li><a href="#processing"><i class="fas fa-angle-right"></i> Buy Properties</a>
                            </li>
                            <li><a href="#research"><i class="fas fa-angle-right"></i> Sell Properties</a>
                            </li>
                            <li><a href="#metal"><i class="fas fa-angle-right"></i> Property Search</a>
                            </li>


                        </ul>
                    </div>
                    <div class="col-lg-3 sub-two-right">
                        <h6>Explore</h6>
                        <ul>
                            <li><a href="#processing"><i class="fas fa-angle-right"></i> Land for Buy</a>
                            </li>
                            <li><a href="#research"><i class="fas fa-angle-right"></i> Home for Buy</a>
                            </li>
                            <li><a href="#metal"><i class="fas fa-angle-right"></i> Land for Sale</a>
                            </li>
                            <li><a href="#metal"><i class="fas fa-angle-right"></i> Home for Sale</a>
                            </li>


                        </ul>
                    </div>

                    <div class="col-lg-3 sub-one-left ps-lg-5">
                        <h6>Stay Update!</h6>
                        <p class="w3f-para mb-4">Subscribe to our newsletter to receive our weekly feed.</p>
                        <div class="w3l-subscribe-content align-self mt-lg-0 mt-5">
                            <form action="#" method="post" class="subscribe-wthree">
                                <div class="flex-wrap subscribe-wthree-field">
                                    <input class="form-control" type="email" placeholder="Email" name="email" required="">
                                    <button class="btn btn-style btn-primary" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            <div class="below-section mt-5 pt-lg-3">
                <div class="copyright-footer">
                    <div class="columns text-left">
                        <p>© 2023 best place.All rights reserved.</p>
                    </div>
                    <ul class="footer-w3list text-right">
                        <li><a href="#url">Privacy Policy</a>
                        </li>
                        <li><a href="#url">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>
    <!-- //move top -->
</footer>
<!--//footer-9 -->

<!-- Template JavaScript -->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/theme-change.js')}}"></script>

<!--/search-->
<script src="{{asset('assets/js/modernizr.custom.js')}}"></script>
<script src="{{asset('assets/js/modernizr.custom.js')}}"></script>
<script src="{{asset('assets/js/demo1.js')}}"></script>
<!--//search-->
<!-- MENU-JS -->
<script>
    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function() {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function() {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });

</script>
<!-- //MENU-JS -->

<!-- disable body scroll which navbar is in active -->
<script>
    $(function() {
        $('.navbar-toggler').click(function() {
            $('body').toggleClass('noscroll');
        })
    });

</script>
<!-- //disable body scroll which navbar is in active -->
<!-- //bootstrap -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
