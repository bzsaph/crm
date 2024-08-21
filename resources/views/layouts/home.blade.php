<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect plus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{ url('assets/welcome/js/script.js') }}"></script>

    <link rel="stylesheet" href="{{ url('assets/welcome/css/styles.css') }}">

</head>

<style>
    .button1 {
        background-color: black;
        opacity: 0.8;
        border: 2px solid #4CAF50;
    }

    .button1:hover {
        background-color: #4CAF50;
        color: white;
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }
body{
    background:#000 !important
}
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar  navbar-expand-lg  scrolling-navbar"   >
        <div class="container" style="margin-left:10%; margin-right:10%">
            <a class="navbar-brand" href="/" style="font-size:30px;color:#fff">
               IIS
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="/">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"></a>
                    </li>



                    <li>
                        <div class="dropdown">
                            <a class="nav-link text-light dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Join Us
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item nav-link" href="/login">login</a>
                                <a class="dropdown-item nav-link" href="/register">Register</a>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <script>
        AOS.init();

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll > 300) {
                    $(".navbar").css("background", "#292828");
                } else {
                    $(".navbar").css("background", "none");
                }
            })
        })

    </script>

    <!--Carousel Wrapper-->



        <main>
            @yield('content')
        </main>

        <footer class="page-footer font-small pt-4 text-light" style="background-color:#386570">

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <h5 class="text-uppercase">Footer Content</h5>
                        <p>This project will help every students and Leactures</p>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase">Partaners</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="https://site.unilak.ac.rw/" class="text-light">UNILAK</a>
                            </li>
                            <li>
                                <a href="" class="text-light">Bazimya saphani</a>
                            </li>
                            {{-- <li>
                                <a href="#!" class="text-light">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Link 4</a>
                            </li> --}}
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase">ADDRESS</h5>

                        <ul class="list-unstyled">
                            {{-- <li>
                                <a href="" class="text-light">Kacyiru</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Oppostite zigama</a>
                            </li> --}}
                            <li>
                                <a href="#!" class="text-light">Whatsapp:0788377874</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Email:yanjye.com@gmail.com</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style="background-color:black; opacity: 0.3">© 2020 Copyright:
                connect plus

            </div>
            <!-- Copyright -->

        </footer>


</body>

</html>
