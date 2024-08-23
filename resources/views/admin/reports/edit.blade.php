@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Edit Report</h1>
    <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_id">Client ID</label>
            <input type="text" class="form-control" id="client_id" name="client_id" value="{{ $report->client_id }}" required>
        </div>
        <div class="form-group">
            <label for="report_content">Report Content</label>
            <textarea class="form-control" id="report_content" name="report_content" required>{{ $report->report_content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Report</button>
    </form>
</div>
@endsection
