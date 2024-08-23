@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Edit Complaint</h1>
    <form action="{{ route('complaints.update', $complaint->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_id">Client ID</label>
            <input type="text" class="form-control" id="client_id" name="client_id" value="{{ $complaint->client_id }}" required>
        </div>
        <div class="form-group">
            <label for="complaint_content">Complaint Content</label>
            <textarea class="form-control" id="complaint_content" name="complaint_content" required>{{ $complaint->complaint_content }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="0" {{ $complaint->status == 0 ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ $complaint->status == 1 ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Complaint</button>
    </form>
</div>
@endsection
