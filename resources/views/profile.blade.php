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

@extends('layouts.dash')

@section('dashboard')

    {{-- <style>
        #form1 {
            display: none;
        }

        #file-image {
            display: inline;
            margin: 0 auto .5rem auto;
            width: auto;
            height: auto;
            max-width: 180px;
        }

        #file-image.hidden {
            display: none;
        }

    </style>



    <div class="container" style="margin-top:8%">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="question1">
                    <div class="card-header"> <strong>Is Your Business is registered?</strong> </div>

                    <div class="card-body">

                        <p>Select "Yes" below if you have a certificate issued by RDB authorizing you to work.</p>
                        <hr>
                        <div class="float-right">
                            <button class="btn btn-secondary" type="button">No</button>
                            <button class="btn btn-primary" type="button"Yes</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="form1">

            <div class="panel-heading">
                <h3 class="panel-title text-center">Ent profile</h3>
            </div>
            <hr>
            <div class="form-group">
                <label for="file-upload" id="file-drag">
                    <img id="file-image" src="#" alt="Preview" class="hidden">
                    <div id="start">
                        <div>Select a file or drag here</div>
                        <br>
                        <span class="text-danger">{{ $errors->first('event_image') }}</span>
                    </div>
                </label>
                <input id="file-upload" type="file" name="event_image" accept="image/*" onchange="readURL(this);">
            </div>

        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script>
            function readURL(input, id) {
                id = id || '#file-image';
                if (input.files & amp; & amp; input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(id).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                    $('#file-image').removeClass('hidden');
                    $('#start').hide();
                }
            }

        </script>

    </div> --}}

    <div class="container">
        <div class="card justify-content-center">
            <h4 class="text-center jumbotron" ><strong>Personal information</strong></h4> <br>
            <div class="row">

                <div class="col-md-4" style="margin: 2%">
                    <div>

                        @if (Auth::user()->user_image == '' || Auth::user()->user_image == null)
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="assets\img\avatar.png" alt="" style="border-radius: 50%; width:200px">
                                    <form class="md-form" action="/image" method="POST">
                                        <div class="file-field">
                                            <div class=" btn-sm float-left">
                                                <input type="file">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <img src=" {{ Auth::user()->user_image }}" alt="">
                                    <form class="md-form" action="/image" method="POST">
                                        <div class="file-field">
                                            <div class=" btn-sm float-left">
                                                <input type="file">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                        @endif

                    </div>
                </div>
                <div class="col-md-7">
                    <form action="/updateUser/{{ Auth::user()->id }}" method="post" accept-charset="utf-8"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="name">
                                    <h5>Name</h5>
                                </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Names"
                                    value="{{ Auth::user()->name }}" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="name">
                                    <h5>Phone Number</h5>
                                </label>
                                <input type="text" name="Pnbr" id="Pnbr" class="form-control" placeholder="250 700 000 000"
                                    value="{{ Auth::user()->Pnbr }}" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>

                        </div>
                        <h5>Address</h5>
                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip03">Country</label>
                                <input type="text" name="counrty" id="counrty" class="form-control" placeholder="Country"
                                    value="{{ Auth::user()->counrty }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid Country.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="validationTooltip04">City</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="City" value="{{ Auth::user()->city }}"
                                    required>
                                <div class="invalid-tooltip">
                                    Please provide a valid city.
                                </div>
                            </div>
                        </div>

                        <h5>Person to contact</h5>
                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip03">Name</label>
                                <input type="text" name="prs_name" id="prs_name" class="form-control" placeholder="Full Names"
                                    value="{{ Auth::user()->prs_name }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid Name.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="validationTooltip04">Phone Number</label>
                                <input type="text" name="prs_nbr" id="prs_nbr" class="form-control" placeholder="250 700 000 000"
                                    value="{{ Auth::user()->prs_nbr }}" required>
                                <div class="invalid-tooltip">
                                    Please provide a valid Phone NUmber.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
