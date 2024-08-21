@extends('layouts.home')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>

    <style>
        body {
            background-color: #e1f1f5;
        }

    </style>

    <div class="container" style="margin-top: 14%; width:50%">


        <div style="background-color: white">
            <br><br>
            <h2 class="text-center">~ Investor ~</h2><br><br>
        </div>

        <div class="row mt-1">
            <div class="col-md-12">

                <!-- Stepers Wrapper -->
                <ul class="stepper stepper-vertical">

                    <!-- First Step -->
                    <li class="">
                        <a href="#!" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                            <span class="circle bg-primary">1</span>
                            <span class="label">First step</span>
                        </a>

                        <!-- Section Description -->
                        <div class="step-content lighten-3" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="https://freefrontend.com/assets/img/css-arrows/wip-bouncing-arrow-animation.gif"
                                            class="card-img" alt="...">
                                        <h3 class="text-center" style="color:#05c9ff">Register</h3>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Investor registers with InvestorsMeet.com and
                                                specifies investment criteria.

                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Second Step -->
                    <li class="">

                        <!--Section Title -->
                        <a href="#!" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                            <span class="circle bg-info">2</span>
                            <span class="label">Second step</span>
                        </a>

                        <!-- Section Description -->
                        <div class="step-content lighten-3" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Complete Profile</h5>
                                            <p class="card-text">
                                                in the dashborad; investor
                                                specifies investment criteria.

                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <img src="https://cdn.lowgif.com/full/777a836b1a480627-.gif" class="card-img"
                                            alt="...">
                                        <h3 class="text-center" style="color:#05c9ff">Complete</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Third Step -->
                    <li class="">
                        <!--Section Title -->
                        <a href="#!" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                            <span class="circle bg-warning">3</span>
                            <span class="label">Third step</span>
                        </a>

                        <!-- Section Description -->
                        <div class="step-content lighten-3" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">

                                    <div class="col-md-4">
                                        <img src="https://icon-library.com/images/waiting-icon-gif/waiting-icon-gif-29.jpg"
                                            class="card-img" alt="..." style="padding:30px">
                                        <h3 class="text-center" style="color:#05c9ff">Wait</h3>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Revision of Profile</h5>
                                            <p class="card-text">
                                                we deeply review your submited application and profile, to grt well
                                                how you want to suppport rntrepreneur and who meets yout support
                                                criteria.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Fourth Step -->
                    <li class="">
                        <!--Section Title -->
                        <a href="#!" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                            <span class="circle bg-success">4</span>
                            <span class="label">Fourth step</span>
                        </a>

                        <!-- Section Description -->
                        <div class="step-content lighten-3" data-aos="fade-right" data-aos-easing="ease-in-sine"
                            data-aos-duration="2000">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Matching</h5>
                                            <p class="card-text">
                                                According to investment criteria and investment nature we match them
                                                with enterpreneurs.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <img src="https://icon-library.com/images/match-icon/match-icon-3.jpg"
                                            class="card-img" alt="..." style="padding:20px">
                                        <h3 class="text-center" style="color:#05c9ff">Match</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- /.Stepers Wrapper -->

            </div>
        </div>




    </div>


@endsection
