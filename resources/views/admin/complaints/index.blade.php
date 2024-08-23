@extends('layouts.adminapp')

@section('content')
    <h1>Complaints</h1>
    <form action="{{ route('complaints.store') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="">
        <textarea name="complaint_text" placeholder="Complaint" required></textarea>
        <button type="submit">Submit Complaint</button>
    </form>
    <ul>
        @foreach ($complaints as $complaint)
            <li>{{ $complaint->complaint_text }} - {{ $complaint->status }}</li>
        @endforeach
    </ul>
@endsection
