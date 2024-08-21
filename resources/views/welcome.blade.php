@extends('layouts.home')

@section('content')
<div>
   <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

	   <!--Indicators-->
	   <ol class="carousel-indicators">
		   <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
		   <li data-target="#carousel-example-1z" data-slide-to="1"></li>
		   <li data-target="#carousel-example-1z" data-slide-to="2"></li>
	   </ol>
	   <!--/.Indicators-->

	   <!--Slides-->
	   <div class="carousel-inner" role="listbox">

		   <!--First slide-->
		   <div class="carousel-item active">
			   <div class="view" style="background-image: url('../assets/img/firstSlide.jpg'); background-repeat: no-repeat; background-size: cover;">

				   <!-- Mask & flexbox options-->
				   <div class="mask rgba-black-light d-flex">

					   <!-- Content -->
					   <div class="text-center text-light mx-5 wow" data-aos="fade-up-right" data-aos-duration="3000" style="margin-top: 15%; margin-left:2%">
						   <div class="row">
							   <div class="col-md-8">
								   <h1 class="mb-4">
									   <strong class="text-light">Students And Rectures Connector</strong>
								   </h1>

								   <p>
									   <strong>Helping Students, Rectures to mark and review there project and give them feedback</strong>
								   </p>

								   <p class="mb-4 d-none d-md-block">
									   <strong></strong>
								   </p>

								   <button class="button button1">
									   <a target="_blank" href="/login" class="btn btn-outline-white btn-lg text-light">Get Started
										   <i class="fa fa-fast-forward ml-2"></i>
									   </a>
								   </button>

							   </div>
						   </div>


					   </div>
					   <!-- Content -->

				   </div>
				   <!-- Mask & flexbox options-->

			   </div>
		   </div>
		   <!--/First slide-->

		   <!--Second slide-->
		   <div class="carousel-item">
			   <div class="view" style="background-image: url('../assets/img/secondSlide.jpg'); background-repeat: no-repeat; background-size: cover;">

				   <!-- Mask & flexbox options-->
				   <div class="mask rgba-black-light d-flex justify-content-end">

					   <!-- Content -->
					   <div class="text-center text-light mx-5 wow" data-aos="fade-up-right" data-aos-duration="6000" style="margin-top:15%; margin-right:20%">
						   {{-- <div class="row">
								<div class="col-md-7"> --}}
						   <h1 class="mb-4">
							   <strong class="text-light">Students And <br> Leactures Connector</strong>
						   </h1>

						   <p>
							   <strong>Helping Students, Leactures and lenders make <br> better decisions
								   about
								   On the project implimented and marking</strong>
						   </p>

						   <p class="mb-4 d-none d-md-block">
							   <strong></strong>
						   </p>

						   <button class="button button1">
							   <a target="_blank" href="/login" class="btn btn-outline-white btn-lg text-light">Get Started
								   <i class="fa fa-fast-forward ml-2"></i>
							   </a>
						   </button>

						   {{--
								</div>
							</div> --}}


					   </div>
					   <!-- Content -->

				   </div>
				   <!-- Mask & flexbox options-->

			   </div>
		   </div>
		   <!--/Second slide-->

		   <!--Third slide-->
		   <div class="carousel-item">
			   <div class="view" style="background-image: url('../assets/img/thirdSlide.JPG'); background-repeat: no-repeat; background-size: cover;">

				   <!-- Mask & flexbox options-->
				   <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

					   <!-- Content -->
					   <div class="text-center text-light mx-5 wow" data-aos="fade-up-right" data-aos-duration="6000" style="margin-top:15%; ">
						   {{-- <div class="row">
								<div class="col-md-7"> --}}
						   <h1 class="mb-4">
							   <strong class="text-light">Lectures And <br> Students Connector</strong>
						   </h1>

						   <p>
							   <strong>Helping Students, Lectures and lenders make <br> better decisions
								   about
								   Project and marking them</strong>
						   </p>

						   <p class="mb-4 d-none d-md-block">
							   <strong></strong>
						   </p>

						   <button class="button button1">
							   <a target="_blank" href="/login" class="btn btn-outline-white btn-lg text-light">Get Started
								   <i class="fa fa-fast-forward ml-2"></i>
							   </a>
						   </button>

						   {{--
								</div>
							</div> --}}
						   <!-- Content -->

					   </div>
					   <!-- Mask & flexbox options-->

				   </div>
			   </div>
			   <!--/Third slide-->

		   </div>
		   <!--/.Slides-->

		   <!--Controls-->
		   <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
			   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			   <span class="sr-only">Previous</span>
		   </a>
		   <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
			   <span class="carousel-control-next-icon" aria-hidden="true"></span>
			   <span class="sr-only">Next</span>
		   </a>
		   <!--/.Controls-->

	   </div>
	   <!--/.Carousel Wrapper-->

   </div>
</div>


</div>

  {{-- About --}}
    <section style="color:#fff !important">
        <div class="container" style="margin-top: 11%" >
            <div class="row">
                <div class="col-sm-5">
                    <h2 data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">Our Story
                    </h2>
                </div>
                <div class="col-sm-6  text-justify" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000">
                    <p>I am a student of Unilak School of Communication in Networking and have some of the skills in web application technology, desktop application, mobile application, hardware development, ussd and channel configuration, devops
                    </p>
                    <p> I always find it difficult and easy to find a job that I am looking for.
                    </p>

                </div>

            </div>
        </div>
    </section>
    {{-- Services --}}

    <section style="background-color: #e1f1f5; margin-top: 10%;">
        <div class="container" style="margin-top: 7%; margin-left:5%;">
            <h1 class="text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-anchor-placement="top-bottom"
                style="margin-bottom: 5%; padding-top:7%; width:100%">Services</h1>
            <div class="row">

                <div class="col-md-4" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">

                    <div class="row">
                        <div class="col-md-3">
                            <img src="assets/img/download.svg" alt=""
                                style="width:70px; font-size:70px; color:rgb(104, 194, 216);text-shadow: 3px 5px 2px rgb(68, 94, 100), 3px 5px rgb(68, 94, 100);">
                        </div>
                        <div class="col-md-9">
                            <h4 class="my-3">Mentorship</h4>
                            <p class="text-muted" style="width: 85%">
                                Helping and teaching peers is my dream and I always have a desire to help.</p>
                            <br><br>
                        </div>
                    </div>


                </div>

                <div class="col-md-4" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="assets\img\funding.svg" alt=""
                                style="width:70px; font-size:70px; color:rgb(104, 194, 216);text-shadow: 3px 5px 2px rgb(68, 94, 100), 3px 5px rgb(68, 94, 100);">
                        </div>
                        <div class="col-md-9">
                            <h4 class="my-3">Funding</h4>
                            <p class="text-muted" style="width: 85%">
                                help someone figure out what to do outside .</p>
                        </div>
                    </div>



                    <br><br>

                </div>

                <div class="col-md-4" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">

                    <div class="row">
                        <div class="col-md-3">
                            <img src="assets\img\advice.svg" alt=""
                                style="width:70px; font-size:70px; color:rgb(104, 194, 216);text-shadow: 3px 5px 2px rgb(68, 94, 100), 3px 5px rgb(68, 94, 100);">

                        </div>
                        <div class="col-md-9">
                            <h4 class="my-3">Advice</h4>
                            <p class="text-muted" style="width: 85%">
                                Advice for everyone to learn well and to have a goal is not just a score but a lot of activities when you know a lot you don't have time to explain it and when you don't know a lot you get a chance to explain it.


                            </p>
                        </div>
                    </div>
                    <br><br>





                </div>
            </div>
        </div>

    </section>

    {{-- testmonials --}}

    <section>
        {{-- <div class="container" style="margin-top: 7%;">
            <h1 class="text-center" data-aos="fade-in" data-aos-duration="1500" data-aos-anchor-placement="top-bottom"
                style="margin-bottom: 5%; width:90%">Successful stories</h1>
            {{-- <div class="row"> --}}
                {{-- <div class="col-md-4">

                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c"
                                alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text"><i class="fa fa-quote-left" aria-hidden="true"></i>
                                Some quick example text to build on the card title and make up
                                the bulk
                                of the card's content. <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>
                            <h5 class="card-title" style="float:right">MyName Surname</h5>


                        </div>
                    </div>

                </div>
            </div> --}}
            {{-- <section class="slider">
                <div class="slide">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c"
                                alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text"><i class="fa fa-quote-left" aria-hidden="true"></i>
                                Some quick example text to build on the card title and make up
                                the bulk
                                of the card's content. <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>
                            <h5 class="card-title" style="float:right">MyName Surname</h5>


                        </div>
                    </div>

                </div>
                <div class="slide">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c"
                                alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text"><i class="fa fa-quote-left" aria-hidden="true"></i>
                                Some quick example text to build on the card title and make up
                                the bulk
                                of the card's content. <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>
                            <h5 class="card-title" style="float:right">MyName Surname</h5>


                        </div>
                    </div>

                </div>
                <div class="slide">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c"
                                alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text"><i class="fa fa-quote-left" aria-hidden="true"></i>
                                Some quick example text to build on the card title and make up
                                the bulk
                                of the card's content. <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>
                            <h5 class="card-title" style="float:right">MyName Surname</h5>


                        </div>
                    </div>

                </div>
                <div class="slide">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c"
                                alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text"><i class="fa fa-quote-left" aria-hidden="true"></i>
                                Some quick example text to build on the card title and make up
                                the bulk
                                of the card's content. <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>
                            <h5 class="card-title" style="float:right">MyName Surname</h5>


                        </div>
                    </div>

                </div>
                <div class="slide">
                    <div class="card profile-card-5">
                        <div class="card-img-block">
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c"
                                alt="Card image cap">
                        </div>
                        <div class="card-body pt-0">
                            <p class="card-text"><i class="fa fa-quote-left" aria-hidden="true"></i>
                                Some quick example text to build on the card title and make up
                                the bulk
                                of the card's content. <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>
                            <h5 class="card-title" style="float:right">MyName Surname</h5>


                        </div>
                    </div>

                </div>
            </section>





        </div> --}}
    </section>

    {{-- contact form --}}

    {{-- <section style="margin-top: 7%; background-color: #e1f1f5">
        <div style="padding-top:1%">
            <div class="container contact-form">
                <div class="contact-image">
                    <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
                </div>
                <form method="post">
                    <h3>Contact Us</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="txtMsg" class="form-control" placeholder="Your Message *"
                                    style="width: 100%; height: 150px;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br><br>
    </section> --}}

    {{-- footer --}}
    <!-- Footer -->

    <!-- Footer -->
    <script>
        $('#recipeCarousel').carousel({
            interval: 10000
        })

        $('.carousel .carousel-item').each(function() {
            var minPerSlide = 3;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });

    </script>
@endsection
  <!-- ======= Header ======= -->

