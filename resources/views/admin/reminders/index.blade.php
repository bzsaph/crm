@extends('layouts.adminapp')

@section('content')
    <h1>Reminders</h1>
    <form action="{{ route('reminders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">
        <input type="hidden" name="billing_id" value="{{ $billing->id }}">
        <input type="date" name="reminder_date" required>
        <button type="submit">Set Reminder</button>
    </form>
@endsection
