{{-- @extends('layouts.home')

@section('content')
<div class="container" style="margin-top:10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.dash')

@section('dashboard')

    <div class="container">


        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">User who are Admin and </h1>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-he  ader py-3">
                    <h6 class="m-0 font-weight-bold">Users</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>UserType</th>
                                    <th>Person To Contach</th>
                                    @if (Auth::user()->user_type =="SuperAdmin")
                                    <th> Action </th>
                                    @endif

                                </tr>
                            </thead>
                            {{-- <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>UserType</th>
                                    <th>Person To Contach</th>
                                </tr>
                            </tfoot> --}}
                            <tbody>


                                    @foreach ($userinfo as $user)
                                    @if ($user->user_type =="SuperAdmin" || $user->user_type =="admin" )
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->Pnbr }}</td>
                                        <td>{{ $user->counrty }}/ <br> {{ $user->city}} </td>
                                        <td>{{ $user->user_type }}</td>
                                        <td>{{ $user->prs_name }}/ <br> {{ $user->prs_nbr }} </td>
                                        @if (Auth::user()->user_type =="SuperAdmin")
                                        <td> <a href="changingstutas/{{ $user->id }}">{{ $user->user_type }}</a> </td>
                                        @endif
                                    </tr>
                                    @endif
                                    @endforeach

                            </tbody>
                        </table>
                    </div>



        </div>
    </div>

@endsection
