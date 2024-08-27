@extends('layouts.adminapp')

@section('content')

<section class="section-container">
    <div class="content-wrapper">
       <div class="content-heading">
          <div>All users in the system</div>
       </div>
       <div class="container-fluid">
          <div class="card">
             <div class="card-header">
                <div class="card-title">All users</div>
             </div>
             <div class="card-body">
                <table class="table table-striped my-4 w-100" id="datatable2">
                    <caption style="caption-side: top; text-align: center">{{ Auth::user()->name }}</caption>
                   <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Create Date</th>
                        <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{!! $item->email !!}</td>
                        <td>
                           {{ $item->company_name ?? 'No company assigned' }}
                       </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @can('user-update')
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-success" id="alert-success">Edit</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
 </section>

@endsection
