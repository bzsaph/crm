@extends('layouts.adminapp')

@section('content')
    <h1>Reports</h1>
    <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">
        <textarea name="report_content" placeholder="Report Content" required></textarea>
        <button type="submit">Create Report</button>
    </form>
    <ul>
        @foreach ($reports as $report)
            <li>{{ $report->report_content }}</li>
        @endforeach
    </ul>
@endsection
