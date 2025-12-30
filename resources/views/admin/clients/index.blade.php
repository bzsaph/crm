
@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Clients</h3>
                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">Add New Client</a>
            </div>
        
            <div class="table-responsive">
                <table class="table table-striped table-sm align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Managed By</th>
                            <th>Status</th>
                            <th>User ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ optional($client->manager)->name ?? $client->managed_by }}</td>
                            <td>
                                <span class="badge {{ $client->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $client->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $client->user_id }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection