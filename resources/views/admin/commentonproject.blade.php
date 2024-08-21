@extends('layouts.adminapp')
@section('content')


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">

       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->
            <div class="card-body" >
              <form class="form-horizontal" action="/comentontheproject" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                     <input class="form-control" type="hidden" readonly  name="projectid" value="{{$viewproject->id}}">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="text-center">comment</label>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                     <button class="btn btn-primary btn-lg btn-block" type="submit">create product</button>
                    <!-- END card-->
                </form>

             </div>
          <!-- DATATABLE DEMO 2-->
          <div class="card"  >
             <div class="card-header">
                <div class="card-title">{!!$viewproject->projectname!!} &nbsp &nbsp <span class="badge badge-warning">{{$viewproject->created_at}}</span></div>
                    <hr>
                <p>{!!$viewproject->link!!}</p>
             </div>
             <div class="card-footer text-right">
                            <button class="btn btn-danger" type="submit">Close project</button>
                        </div>
             <hr>
              <div class="card-body" >
              @foreach($viewcomment as $key => $value)
              <p> <span class="text-success">From : {{$value->fromcoment->name}}</span>   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span class="text-warning">To: {{$value->toname->name}} </span> </p>

              <p>{!!$value->comment!!}</p><hr>

              @endforeach
             </div>
             <hr>

          </div>
          <!-- DATATABLE DEMO 3-->

       </div>
    </div>
 </section>
<!-- Page footer-->
@endsection

