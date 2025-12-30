@extends('layouts.adminapp')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Sale Details</h1>
    
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            Sale #{{ $sale->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3">Client: {{ $sale->client->name ?? 'N/A' }}</h5>
            
            <!-- Display Invoice Number -->
            <p class="card-text"><strong>Invoice Number:</strong> {{ $sale->invoice_number }}</p>

            <!-- Products Table -->
            <h5 class="card-title mt-4">Products</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sale->soldProducts as $product)
                        <tr>
                            <td>{{ $product->stock->item_name ?? 'N/A' }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ number_format($product->unit_price, 2) }} Rwf</td>
                            <td>{{ number_format($product->total_price, 2) }} Rwf</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No products found for this sale.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <div>
                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                
            </div>
            <div>
                <a href="{{ route('sales.index') }}" class="btn btn-primary">Back to Sales List</a>
                <a href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success">Download Invoice</a>
                <a href="{{ route('sales.perform', $sale->id) }}" class="btn btn-success btn-sm">perform</a>
            </div>
        </div>
    </div>
</div>
@endsection
