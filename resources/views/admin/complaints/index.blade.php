@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Complaints</h1>
    <a href="{{ route('complaints.create') }}" class="btn btn-primary">Add New Complaint</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client ID</th>
                <th>Complaint Content</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $complaint)
            <tr>
                <td>{{ $complaint->id }}</td>
                <td>{{ $complaint->client_id }}</td>
                <td>{{ $complaint->complaint_content }}</td>
                <td>{{ $complaint->status == 1 ? 'Resolved' : 'Pending' }}</td>
                <td>
                    <a href="{{ route('complaints.edit', $complaint->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
