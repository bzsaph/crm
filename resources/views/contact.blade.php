{{-- @extends('layouts.home')

@section('content')
<div class="container" style="margin-top:10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.home')

@section('content')
    <style>
        body {
            background-image: url('../assets/img/navy.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid black;
            border-radius: 0%;
        }

    </style>

    <div style="margin-top: 13%; margin-left:5%; margin-bottom:5%">
        <div class="row">
            <div class="col-sm-6" style="margin-right:1%">

                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-justify my-4" style="font-size: 2em">Contact us</h2>
                <!--Section description-->


                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-9 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="" method="POST">

                            <!--Grid row-->
                            <div class="row">

                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <p class="text-justify w-responsive mx-auto mb-5" style="width: 95%">Do you have any
                                            questions? Please do not hesitate to
                                            contact us directly.Our team will come back to you within
                                            a matter of hours to help you.</p>
                                    </div>
                                </div>



                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="name" class="text-muted">Your name</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="email" class="text-muted">Your email</label>
                                        <input type="text" id="email" name="email" class="form-control">

                                        <br>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <label for="message" class="text-muted">Your message</label>
                                        <textarea type="text" id="message" name="message" rows="2"
                                            class="form-control md-textarea"></textarea>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->

                        </form>

                        <div class="text-center text-md-left">
                            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                        </div>
                        <div class="status"></div>
                    </div>
                    <!--Grid column-->


                    <!--Grid column-->

                </div>

                <!--Section: Contact v.2-->
            </div>
            <div class="col-sm-5 text-light d-flex justify-content-center" style="background-color:#152238; ">
                <div class="col-md-5 text-center" style="margin-top:70px ">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>KN 8 Ave, Kigali</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+250788522501</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>yanjye.com@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



@endsection
