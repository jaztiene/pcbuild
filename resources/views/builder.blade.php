<section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Builder</h6>
                        <h2>We offer the best pc builders for you</h2>
                    </div>
                </div>
            </div>

            <div class="row">
            @foreach($data2 as $data2)
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img height="200" width="200" src="builderimage/{{$data2->image}}" alt="builder #1">
                        </div>
                        <div class="down-content">
                            <h4>{{$data2->name}}</h4>
                            <span>{{$data2->specialty}}</span>
                        </div>
                    </div>
                </div>

                @endforeach
                
            </div>
        </div>
    </section>