@extends('layouts.adminapp')
@section('content')
<!-- Main section-->
<section class="section-container">
    <!-- Page content-->
    @if (Session::has('message'))
    <div class="btn btn-success" id="alert-success">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md 6">
            <div class="content-wrapper ">
                <div class="content-heading">
                    <div> New Role</div>
                </div>
            </div>
        </div>

    </div>
    <!-- START row-->
    <div class="row">

        <div class="col-lg-6">
            <form class="form-horizontal" action="/postrole" method="POST">
                @csrf

                <!-- START card-->
                <div class="card card-default">
                    <div class="bg-gray-lighter px-3 py-2 mb-3">Role</div>
                    <div class="card-body">

                        <fieldset>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Name:</label>
                                <div class="col-md-9" style="margin-top: 10px">
                                    <input class=" @error('name') is-invalid @enderror form-control" type="text"
                                        placeholder="Admin" name="name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </fieldset>


                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-info" id="alert-info" type="submit">Create role</button>
                    </div>
                </div>
                <!-- END card-->
            </form>
        </div>



    </div>

</section>

@endsection
