@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Add New Complaint</h1>
    <form action="{{ route('complaints.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="client_id">Client ID</label>
            <input type="text" class="form-control" id="client_id" name="client_id" required>
        </div>
        <div class="form-group">
            <label for="complaint_content">Complaint Content</label>
            <textarea class="form-control" id="complaint_content" name="complaint_content" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="0">Pending</option>
                <option value="1">Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Complaint</button>
    </form>
</div>
@endsection
