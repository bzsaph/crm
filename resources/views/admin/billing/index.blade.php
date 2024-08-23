<!-- resources/views/admin/billing/index.blade.php -->
@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Billed Clients</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Billing Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->billing_status }}</td>
                        <td>{{ $client->billing_type }}</td>
                        <td>
                            <a href="{{ route('billing.remind', $client->id) }}" class="btn btn-warning">Remind to Pay</a>
                            <a href="{{ route('billing.details', $client->id) }}" class="btn btn-info">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
