@extends('layouts.adminapp')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Sales List</h1>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('sales.create') }}" class="btn btn-primary">Add New Sale</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Invoice Number</th>
                    <th>Date Of invoice </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->client_name }}</td>
                        <td>{{ $sale->invoice_number ?? 'N/A' }}</td> <!-- Handle missing invoice_number -->
                        <td>{{ \Carbon\Carbon::parse($sale->invoicedate)->format('F d, Y') }}</td> <!-- Replace with actual sale date if available -->
                        <td>
                            <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                           
                            <a href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success btn-sm">Invoice</a>
                            <a href="{{ route('sales.perform', $sale->id) }}" class="btn btn-success btn-sm">perform</a>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No sales records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
