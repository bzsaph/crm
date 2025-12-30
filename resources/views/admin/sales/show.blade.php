@extends('layouts.adminapp')
@section('content')
<div class="container-fluid">
    <section class="section-container">
        <div class="content-wrapper">

            <h1 class="mb-4">Sale Details</h1>

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Sale #{{ $sale->id }}</h5>
                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </div>
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Client:</strong> {{ $sale->client->name ?? 'N/A' }}<br>
                            <strong>Invoice Number:</strong> {{ $sale->invoice_number }}<br>
                            <strong>Invoice Date:</strong> {{ $sale->invoicedate }}
                        </div>
                        <div class="col-md-4">
                            <strong>Sale Type:</strong> {{ $sale->soldProducts->first()->sale_type ?? 'N/A' }}<br>
                            <strong>Company TIN:</strong> {{ $sale->soldProducts->first()->company_tin ?? 'N/A' }}<br>
                            <strong>Computation Type:</strong> {{ $sale->soldProducts->first()->computation_type ?? 'N/A' }}
                        </div>
                        <div class="col-md-4">
                            <strong>Currency:</strong> {{ $sale->soldProducts->first()->currency ?? 'RWF' }}<br>
                            <strong>Exchange Rate:</strong> {{ $sale->soldProducts->first()->exchange_rate ?? 1 }}<br>
                            <strong>Discount Type:</strong> {{ $sale->soldProducts->first()->discount_type ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <span class="badge bg-info me-2">Voucher Amount: {{ number_format($sale->soldProducts->first()->voucher_amount ?? 0, 2) }} Rwf</span>
                        </div>
                        <div class="col-md-4">
                            <span class="badge bg-success me-2">Discount: {{ number_format($sale->soldProducts->first()->discount_amount ?? 0, 2) }} Rwf</span>
                        </div>
                        <div class="col-md-4">
                            <span class="badge bg-warning text-dark me-2">Total Amount: {{ number_format($sale->soldProducts->sum('total_amount'), 2) }} Rwf</span>
                            <span class="badge bg-info">Total VAT: {{ number_format($sale->soldProducts->sum('total_vat'), 2) }} Rwf</span>
                        </div>
                    </div>

                    <!-- Products Table -->
                    <h5 class="card-title mb-3">Products</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Batch</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th>Tax Code</th>
                                    <th>Tax Rate</th>
                                    <th>Expire Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sale->soldProducts as $product)
                                    <tr>
                                        <td>{{ $product->stock->item_name ?? 'N/A' }}</td>
                                        <td>{{ $product->item_code ?? 'N/A' }}</td>
                                        <td>{{ $product->item_description ?? 'N/A' }}</td>
                                        <td>{{ $product->item_category ?? 'N/A' }}</td>
                                        <td>{{ $product->batch ?? 'N/A' }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ number_format($product->unit_price, 2) }} Rwf</td>
                                        <td>{{ number_format($product->total_price, 2) }} Rwf</td>
                                        <td>{{ $product->tax_code ?? 'N/A' }}</td>
                                        <td>{{ number_format($product->tax_rate, 2) }}%</td>
                                        <td>{{ $product->expire_date ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">No products found for this sale.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('sales.index') }}" class="btn btn-primary">Back to Sales List</a>
                    <a href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success">Download Invoice</a>
                </div>
            </div>

        </div>
    </section>
</div>

<style>
    .badge { font-size: 0.9rem; }
    table th, table td { vertical-align: middle !important; }
    .table-hover tbody tr:hover { background-color: #f0f8ff; }
</style>
@endsection
