@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Sales</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('sales.create') }}" class="btn btn-primary">Add New Sale</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->client_name }}</td> <!-- Display client name -->
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success btn-sm">Invoice</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No sales records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
