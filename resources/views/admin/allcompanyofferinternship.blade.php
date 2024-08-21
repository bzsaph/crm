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
                                <th>Company name</th>
                                <th>Company Website</th>
                                <th>Contact Person</th>
                                <th>Phone Number</th>

                                <th>Stutas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $companys )


                            <tr>
                                <td>{{$companys->companyname }}</td>
                                <td>{{$companys->website }}</td>
                                <td>{{$companys->contactperson }}</td>
                                <td>{{$companys->phonenumber }}</td>

                                <td class="btn btn-warning">{{$companys->star }}
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
