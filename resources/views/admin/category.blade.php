@extends('layouts.adminapp')
@section('content')


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
       <div class="content-heading">
          <div>Project submited
             <small>view </small>
          </div>
       </div>
       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->

          <!-- DATATABLE DEMO 2-->
          <div class="card"  >
             <div class="card-header">
                <div class="card-title">Please review your project</div>



             </div>
             <div class="card-body" >

                <table class="table table-striped my-4 w-100" id="datatable2" >
                    <caption style="caption-side: top; text-align: center">{{Auth::user()->name}}</caption>
                   <thead>

                      <tr>
                        <th>Created by</th>
                        <th>Assigned To</th>
                        <th>Project name</th>

                        <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>

                    @foreach ($Newproject as $Key=>$item)

                    <tr>
                        <td class="bg-warning text-white" > <a class="text-white"  href="commentonproject/{{$item->id}}"> {{$item->createdby->name}}</a></td>
                        <td>{{$item->assignedto->name}}</td>
                        <td>{!! $item->projectname !!}</td>
                        <td>

                        <!-- Button trigger modal -->
                            <button type="button" class="btn bg-success " data-toggle="modal" data-target="#ex{{$item->id}}">
                          edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="ex{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Ploject LInk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   <p>{!! $item->link !!}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>



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

