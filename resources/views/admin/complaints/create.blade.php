@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Create Complaint for Client: {{ $client->name }}</h1>

    <form action="{{ route('complaints.store') }}" method="POST">
        @csrf

        <input type="hidden" name="client_id" value="{{ $client->id }}">

        <div class="form-group">
            <label for="complaint_content">Complaint Content</label>
            <textarea id="complaint_content" name="complaint_content" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Complaint</button>
    </form>
</div>
@endsection
