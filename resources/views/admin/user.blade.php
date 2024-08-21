@extends('layouts.adminapp')
@section('content')


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
       <div class="content-heading">
          <div>All users in the system

          </div>
       </div>
       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->

          <!-- DATATABLE DEMO 2-->
          <div class="card"  >
             <div class="card-header">
                <div class="card-title">All user </div>



             </div>
             <div class="card-body" >

                <table class="table table-striped my-4 w-100" id="datatable2" >
                    <caption style="caption-side: top; text-align: center">{{Auth::user()->name}}</caption>
                   <thead>

                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>craete date</th>
                        <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>

                    @foreach ($user as $Key=>$item)

                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{!! $item->email !!}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            @can('user-update')<a href="/edituser/{{$item->id}}" class="btn btn-success" id="alert-success">Edit</a>@endcan
                            {{-- <a href="" class="btn btn-danger" id="alert-error">Delete</a> --}}
                            {{-- <a href="" class="btn btn-warning" id="alert-warning">Warning</a> --}}

                        </td>
                         </tr>

            @endforeach
                   </tbody>
                </table>
             </div>
          </div>
          <!-- DATATABLE DEMO 3-->

       </div>
    </div>
 </section>
<!-- Page footer-->
@endsection

