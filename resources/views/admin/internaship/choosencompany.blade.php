@extends('layouts.adminapp')
@section('content')
 <!-- Main section-->
 <section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading text-center">
            <div>New
                <small>Company</small>
            </div>
        </div>
        <!-- START row-->
        <div class="row">
            {{-- @can('user-create') --}}
            <div class="col-lg-12" >
                <form class="form-horizontal" action="/insertnewcompany" method="POST">
                    @csrf
                    <!-- START card-->
                    <div class="card card-default ">
                        <div class="bg-info px-3 py-2 mb-3 ">Insert new Company</div>
                        <div class="card-body">

                            <fieldset>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-success">Created by</label>
                                    <div class="col-md-6">
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" readonly name="length" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-success">Contact Person</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control @error('contactperson') is-invalid @enderror" type="text" name="contactperson" required>
                                            @error('contactperson')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-success">Phone Number</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control @error('phonenumber') is-invalid @enderror" type="text" name="phonenumber" required>
                                            @error('contactperson')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-success">Company Name</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control @error('companyname') is-invalid @enderror" type="text" name="companyname" required>
                                         @error('companyname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>



                                 <div class="form-group row ">
                                    <label class="col-md-2 col-form-label text-success">Website</label>
                                    <div class="col-md-6 " style="margin-top: 10px">
                                        <input class="form-control @error('website') is-invalid @enderror" type="text" name="website" required>
                                         @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                    </div>
                                </div>


                            </fieldset>



                                </div>

                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-info " type="submit">Send to Supervisor</button>
                        </div>
                    </div>
                    <!-- END card-->
                </form>
            </div>
        </div>

    </div>
</section>

@endsection
