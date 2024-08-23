@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Reports</h1>
    <a href="{{ route('reports.create') }}" class="btn btn-primary">Add New Report</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client ID</th>
                <th>Report Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->client_id }}</td>
                <td>{{ $report->report_content }}</td>
                <td>
                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
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
