
    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($viewchef as $foodchefs)
                <div class="chef-item">

                    <div class="thumb">
                        <div class="overlay"></div>
                        <ul class="social-icons">

                            <li><a target="_blank" href="https://www.facebook.com/{{$foodchefs->fb}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="http://www.twitter.com/{{$foodchefs->tweeter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="http://www.instagram.com/{{$foodchefs->insta}}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <img src="/foodchefsimage/{{$foodchefs->image}}" alt="Chef">
                    </div>
                    <div class="down-content">
                        <h4>{{$foodchefs->name}}</h4>
                        <span>{{$foodchefs->speciality}}</span>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->
