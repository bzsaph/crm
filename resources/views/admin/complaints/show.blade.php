<!-- resources/views/admin/complaints/show.blade.php -->

@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Complaint Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Complaint ID: {{ $complaint->id }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $complaint->complaint_text }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($complaint->status) }}</p>
            <a href="{{ route('complaints.edit', $complaint->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('complaints.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
