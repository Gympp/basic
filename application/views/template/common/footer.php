<?php if (!empty($_SESSION['notify']) && $_SESSION['notify'] == 'success'){ ?>
<div class="flag note note--success">
    <div class="flag__image note__icon">
        <i class="fa fa-check"></i>
    </div>
    <div class="flag__body note__text">
        Your login was successful!
    </div>
    <a href="#" class="note__close" data-original-title="" title="">
        <i class="fa fa-times"></i>
    </a>
</div>
<?php unset($_SESSION['notify']);
} ?>
        <section id="sub-footer" class="bgcolor-2D2D2D visible-xs hidden-sm hidden-md hidden-lg">
            <div class="container width-90">                
                <div class="col-xs-12 text-center color-aaa margin-b60">
                <img width="130" src="http://gympp.com/web/img/logo.png" alt="Gyms in India">
                <h4>Easiest way to find a Gym  <br> <div class="separator"></div> </h4><br>
                <ul class="footer-links--big">
                    <li> <a href="http://gympp.com/careers">We're Hiring!</a> </li>
                    <li><a href="http://gympp.com/about-us">About</a></li>
                    <li><a href="http://gympp.com/blog">Blog</a></li>
                    <li><a href="http://gympp.com/business">Businesses</a></li>
                    <li><a href="http://gympp.com/fal">Fitness Analytics</a></li>
                    <li><a href="http://gympp.com/sitemap">Sitemap</a></li>
                    <li><a href="http://gympp.com/policy">Policy</a></li>
                    <li><a href="http://gympp.com/privacy">Privacy</a></li>
                    <li class="contact-big-footer-link"><a href="http://gympp.com/contact-us">Contact</a></li>
                   </ul>                
                </div>
            </div>
        </section>
        
        <section id="sub-footer" class="hidden-xs bgcolor-2D2D2D">
            <div class="container width-90">
            
            <div class="col-sm-3 color-aaa margin-b60">
            <div class="title_left wow fadeInDown footer-gym-loc" data-wow-delay="0" ><strong>Explore</strong> <br> <div class="separator"></div></div>
            <h4> <i class="fa fa-newspaper-o fa-1x margin-r10"></i><a target="_blank" href="http://gympp.com/blog">Our Blog</a></h4><br>
            <h4> <i class="fa fa-line-chart fa-1x margin-r10"></i><a  target="_blank" href="/fal">Fitness Analytics</a></h4><br>
            <h4> <i class="fa fa-tablet fa-1x margin-r10"></i><a target="_blank" href="/api">Mobile API</a></h4><br>
            
            
            <div class="title_left wow fadeInDown footer-gym-loc" data-wow-delay="0" ><strong>Follow</strong> <br> <div class="separator"></div></div>
            <h4> <i class="fa fa-facebook-square fa-1x margin-r10"></i><a target="_blank" href="https://www.facebook.com/gympp">Facebook</a></h4><br>
            <h4> <i class="fa fa-twitter-square fa-1x margin-r10"></i><a target="_blank" href="https://twitter.com/GymppCare">Twitter</a></h4><br>
            <h4> <i class="fa fa-linkedin-square fa-1x margin-r10"></i><a target="_blank" href="https://www.linkedin.com/company/gympp-com">Linked In</a></h4><br>
            <h4> <i class="fa fa-google-plus-square fa-1x margin-r10"></i><a target="_blank" href="https://www.google.com/+Gympp-com">Google Plus</a></h4><br>
            </div>
            
            
            
            <div class="col-sm-3 color-aaa margin-b60">
            <div class="title_left wow fadeInDown footer-gym-loc"  data-wow-delay="0" ><strong>Comapny</strong> <br> <div class="separator"></div></div>
            <h4> <i class="fa fa-flag-o fa-1x margin-r10"></i><a target="_blank" href="/about-us">About Us</a></h4><br>
            <!--h4> <i class="fa fa-bullhorn fa-1x margin-r10"></i>Advertise</h4><br>
            <h4> <i class="fa fa-copyright fa-1x margin-r10"></i>Attributions</h4><br-->
            <h4> <i class="fa fa-building fa-1x margin-r10"></i><a target="_blank" href="/business">Businesses</a></h4><br>
            <h4> <i class="fa fa-trophy fa-1x margin-r10"></i><a target="_blank" href="/careers">Careers</a></h4><br>
            <h4> <i class="fa fa-envelope-o fa-1x margin-r10"></i><a target="_blank" href="/contact-us">Contact Us</a></h4><br>
            <!--h4> <i class="fa fa-download fa-1x margin-r10"></i><a target="_blank" href="/files/mediakit.zip">Media Kit</a></h4><br-->
            <h4> <i class="fa fa-shield fa-1x margin-r10"></i><a target="_blank" href="/privacy">Privacy</a></h4><br>
            <h4> <i class="fa fa-gavel fa-1x margin-r10"></i><a target="_blank" href="/policy">Policy</a></h4><br>
            <h4> <i class="fa fa-sitemap fa-1x margin-r10" ></i><a target="_blank" href="/sitemap">Sitemap</a></h4><br>
			<h4> <i class="fa fa-question fa-1x margin-r10" ></i><a target="_blank" href="/faq">FAQ</a></h4><br>
            <!--h4> <i class="fa fa-thumbs-up fa-1x margin-r10"></i>Testimonials</h4><br-->
            </div>
            
            <div class="col-sm-6 color-aaa margin-b60">
            <div class="title_left wow fadeInDown footer-gym-loc" data-wow-delay="0" ><strong>We, Gympp<i class="fa fa-exclamation fa-2x margin-l10"></i></strong> <br> <div class="separator"></div></div>
            <h4 class="info color-aaa">Gympp.com is a Gym Discovery and review portal which allows you to search for nearby Gyms, Fitness Clubs, Sports and Yoga Centres with required amenities. Scan the reviews and various ratings of your nearby Gyms to make sure it has all the stats you'll need for a comfortable workout. Get a free One day pass and choose your next fitness destination.</h4><br>
                        
            <div class="title_left wow fadeInDown footer-gym-loc" data-wow-delay="0" ><strong>Gympp + Locations
            <i class="fa fa-map-marker fa-2x margin-l10"></i></strong> <br> <div class="separator"></div></div>
            
            <?php foreach($active_main_locations as $location){ ?>
                <a href="/<?php echo $location['main_location_seo_title'];?>" class="button--<?php echo $location['main_location_color'];?>"><?php echo $location['main_location_name'];?></a>
            <?php } ?>
            </div>
            
                <div class="row col-sm-12 text-center">
                    <div class="title small wow fadeInDown footer-heading"data-wow-delay="0" >
                    <strong>Gympp - Fun, Fitness & you</strong><br> <div class="separator"></div></div>
                </div>
            </div>
        </section>
        <section id="sub-footer" class="sub-footer">
            <div class="container">
                <div class="row text-center">                           
                    <div class="footer-msg">
                    By continuing past this page, you agree to Terms of Use. All trademarks are properties of their respective owners. 2014-2015 - Gympp Media Pvt Ltd. All rights reserved.
                    </div>                      
                </div>
            </div>
        </section>
        <!-- Awesome Gympp footer closes here -->
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>
