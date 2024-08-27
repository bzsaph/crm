@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
        <div class="content-heading">
            <div>All Companies</div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">List of Companies</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->phone }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ ucfirst($company->status) }}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">View</a>
                                    <form action="{{ route('companies.updateStatus', $company->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $company->status === 'active' ? 'closed' : 'active' }}">
                                        <button type="submit" class="btn btn-warning">{{ $company->status === 'active' ? 'Disable' : 'Activate' }}</button>
                                    </form>
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
