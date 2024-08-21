@extends('layouts.adminapp')
@section('content')
 <!-- Main section-->
 <section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div>Insert your project here
                <small>New project</small>
            </div>
        </div>

        <!-- START row-->
        <div class="row">
            {{-- @can('user-create') --}}
            <div class="col-lg-12" >
                <form class="form-horizontal" action="/storeproject" method="POST">

                    @csrf

                    <!-- START card-->
                    <div class="card card-default">
                        <div class="bg-gray-lighter px-3 py-2 mb-3">Instert your project to be reviewed</div>
                        <div class="card-body">

                            <fieldset>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Name of Auth</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" readonly name="length" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Project name</label>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <input class="form-control" type="text" name="projectname" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">supervisor </label>
                                    <div class="col-md-6" style="margin-top:10px">
                                        <select id="" class="form-control" name="assignedto">
                                            <option  selected disabled >choose supervisor name</option>
                                            @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>


                                    </div>
                                </div>
                            </fieldset>


                                <div class="form-group row" >
                                    <label class="col-md-2 col-form-label">Your project link and more about</label>
                                    <div class="col-md-10" style="margin-top:10px">
                                    <textarea id="summernote" class="form-control" maxlength="600" name="link"></textarea>
                                </div>
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
