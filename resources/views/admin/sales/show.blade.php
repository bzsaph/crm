@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Sale Details</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Sale #{{ $sale->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Client: {{ $sale->client->name ?? 'N/A' }}</h5>
            
            <!-- Display Invoice Number -->
            <p class="card-text">Invoice Number: {{ $sale->invoice_number }}</p>

            <!-- Products Table -->
            <h5 class="card-title">Products</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sale->products as $product)
                        <tr>
                            <td>{{ $product->stock->item_name ?? 'N/A' }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->total_price }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No products found for this sale.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('sales.index') }}" class="btn btn-primary">Back to Sales List</a>
            <a href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success">Download Invoice</a>
        </div>
    </div>
</div>
@endsection
