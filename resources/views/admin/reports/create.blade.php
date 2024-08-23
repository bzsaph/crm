@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Create Report</h1>

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="client_id">Client</label>
            <select id="client_id" name="client_id" class="form-control" required>
                <option value="">Select a Client</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="report_content">Report Content</label>
            <textarea id="report_content" name="report_content" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Report</button>
    </form>
</div>
@endsection
