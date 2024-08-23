<!-- resources/views/admin/billing/details.blade.php -->
@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Billing Details for {{ $client->name }}</h1>
        <p>Email: {{ $client->email }}</p>
        <p>Phone: {{ $client->phone }}</p>
        <p>Status: {{ $client->billing_status }}</p>
        <p>Billing Type: {{ $client->billing_type }}</p>
        <p>Total Amount: ${{ $client->billing_amount }}</p>
        <p>Due Date: {{ $client->billing_due_date }}</p>
        <a href="{{ route('billing.remind', $client->id) }}" class="btn btn-warning">Remind to Pay</a>
        <a href="{{ route('billing.index') }}" class="btn btn-secondary">Back to Billing</a>
    </div>
@endsection
