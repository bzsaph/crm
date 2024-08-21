@extends('layouts.adminapp')
@section('content')
 <!-- Main section-->
 <section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div>Create Product
                <small>Insert Product</small>
            </div>
        </div>

        <!-- START row-->
        @can('product-create')
        <div class="row">
            <div class="col-lg-12" >

                <form class="form-horizontal" action="/postnewproduct" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- START card-->
                    <div class="card card-default">
                        <div class="bg-gray-lighter px-3 py-2 mb-3">Product</div>
                        <div class="card-body">

                            <fieldset>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">product name:</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control" type="text" placeholder="iphone3" name="pname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">product categor:</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <select class="form-control" name="pcategory" required>
                                            <option value="">choose category</option>
                                            <option value="phone">Phone</option>
                                            <option value="tiv">Tv</option>
                                            <option value="car">Car</option>
                                            <option value="computer">Computer</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control" type="text" placeholder="Second hand iphone" name="ptitle" required>
                                    </div>
                                </div>


                            </fieldset>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">image</label>
                                <div class="col-md-6" style="margin-top: 10px">
                                    <input type="file" name="image" class="image" />

                                </div>
                            </div>
                            <div class="form-group row" >
                                <label class="col-md-2 col-form-label">Discription</label>
                                <div class="col-md-10" style="margin-top:10px">
                                <textarea id="summernote" class="form-control" maxlength="600" name="pdiscription" required></textarea>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-info" type="submit">create product</button>
                        </div>
                    </div>
                    <!-- END card-->
                </form>
            </div>
        </div>
    </div>
        @endcan

@endsection


