@extends('layouts.adminapp')
@section('content')
<!-- Main section-->
<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div>INTERNSHIP REQUEST
                {{-- <small>Internership request</small> --}}
            </div>
        </div>

        <!-- START row-->
        <div class="row">
            {{-- @can('user-create') --}}
            <div class="col-lg-12">
                <form class="form-horizontal" action="/storeinternaship" method="POST">

                    @csrf
                    <!-- START card-->
                    <div class="card card-default">
                        <div class="bg-gray-lighter px-3 py-2 mb-3">Request internership </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Name of Auth</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" readonly name="length" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">INTERNSHIP Starting Date</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control" type="date" name="startingdate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">INTERNSHIP Ending Date</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control" type="date" name="endingdate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label"> School supervisor </label>
                                    <div class="col-md-6" style="margin-top:10px">
                                        <select id="" class="form-control" name="assignedto" required>
                                            <option selected disabled>choose supervisor name</option>
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Company Name</label>
                                    <div class="col-md-6" style="margin-top:10px">
                                        <select id="" class="form-control" name="companyid" required>
                                            <option selected disabled>Company Name</option>
                                            @foreach ($company as $item)
                                            <option value="{{ $item->id }}">{{ $item->companyname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Super Visor name</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control" type="text" name="spname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Super Visor phone</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control" type="text" name="spphone" required>
                                    </div>
                                </div>
                            </fieldset>

                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-info" type="submit">Send to Supervisor</button>
                    </div>
            </div>
            <!-- END card-->
            </form>
        </div>
    </div>

    </div>
</section>

@endsection
