<!-- resources/views/admin/complaints/edit.blade.php -->

@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Edit Complaint</h1>
    <form action="{{ route('complaints.update', $complaint->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_id">Client</label>
            <select class="form-control" id="client_id" name="client_id" required>
                <!-- Populate this with clients data -->
                <option value="{{ $complaint->client_id }}" selected>{{ $complaint->client->name }}</option>
                <!-- Add other options here -->
            </select>
        </div>
        <div class="form-group">
            <label for="complaint_text">Complaint Content</label>
            <textarea class="form-control" id="complaint_text" name="complaint_text" required>{{ $complaint->complaint_text }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="open" {{ $complaint->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                <option value="closed" {{ $complaint->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Complaint</button>
    </form>
</div>
@endsection
