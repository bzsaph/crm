@extends('layouts.adminapp')
@section('content')


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div>Internaship
                <small>Download Data </small>
            </div>
        </div>
        <div class="container-fluid">
            <!-- DATATABLE DEMO 1-->

            <!-- DATATABLE DEMO 2-->
            <div class="card">

                <div class="card-body">

                    <table class="table table-striped my-4 w-100" id="datatable2">
                        <caption style="caption-side: top; text-align: center">{{Auth::user()->name}}</caption>
                        <thead>
                            <tr>
                                <th>Assigned to</th>
                                <th>Starting date</th>
                                <th>Ending Date</th>
                                <th>Super visor name</th>
                                <th>Super visor phone</th>
                                <th>Company name</th>
                                <th>Created at</th>
                                <th>Stutas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$checkif->assigninternership->name }}</td>
                                <td>{{$checkif->startingdate }}</td>
                                <td>{{$checkif->endingdate }}</td>
                                <td>{{$checkif->spname }}</td>
                                <td>{{$checkif->spphone }}</td>
                                <td>{{$checkif->company->companyname }}</td>
                                <td>{{$checkif->created_at }}</td>
                                <td>{{$checkif->status }}
                                    {{-- @if($checkif->decision =='yes') --}}
                                    <a href="addreportoftheweek/{{$checkif->id }}" target="_blank"><i class="fa fa-plus"></i></a>
                                    {{-- @else
                         {{$checkif->decision }}
                                    @endif --}}
                                </td>
                            </tr>

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
