@extends('layouts.adminapp')
@section('content')


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">

        <div class="container">
            <!-- DATATABLE DEMO 1-->

            <!-- DATATABLE DEMO 2-->

            <div class="card-body">
                <form class="form-horizontal" action="/postweekreport" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control" type="hidden" readonly name="interneshipid" value="{{$reportoftheweek->id}}">
                    <div class="form-group container-sm">
                        <label for="exampleFormControlTextarea1" class="text-center">Week :ex Week one</label>
                        <input class="form-control" type="text" name="week">

                    </div>
                    <div class="form-group container">
                        <input class="form-control" type="hidden" readonly name="assignedto" value="{{$reportoftheweek->assignedto}}">
                        <label for="exampleFormControlTextarea1" class="text-center">Discription of the week</label>
                        <textarea class="form-control" id="summernote" name="comment" id="exampleFormControlTextarea1" rows="2" col="20"></textarea>

                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">create product</button>

                    <!-- END card-->
                </form>


            </div>
            <hr>
            <div class="card-body">

                <div class="card-body">

                    <table class="table table-striped my-4 w-100" id="datatable2">
                        <caption style="caption-side: top; text-align: center">{{Auth::user()->name}}</caption>
                        <thead>
                            <tr>
                                <th>Week</th>
                                <th>Details</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Reportinternship as $key => $value)
                            <tr>
                                <td>{{$value->week}}</td>
                                <td>{!!$value->information!!}</td>
                                <td>{{$value->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- DATATABLE DEMO 3-->

</section>
<!-- Page footer-->
@endsection

