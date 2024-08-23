@extends('layouts.adminapp')
@section('content')
    <h1>Billing</h1>
    <form action="{{ route('billing.createMonthly') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit">Create Monthly Subscription</button>
    </form>
    <!-- Add Yearly Subscription form similarly -->
@endsection
