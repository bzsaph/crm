@extends('layouts.adminapp')

@section('content')
<div class="container-fluid">
    <section class="section-container">
        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="content-heading d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm">Add New Sale</a>

                <!-- Language Dropdown -->
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                        data-toggle="dropdown">English</button>
                    <div class="dropdown-menu dropdown-menu-right-forced animated fadeInUpShort" role="menu">
                        <a class="dropdown-item" href="#" data-set-lang="en">English</a>
                    </div>
                </div>
            </div>

            <!-- Sales Table -->
            <div class="table-responsive">
                <table class="table table-striped sales-table" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Invoice Number</th>
                            <th>Date Of Invoice</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->client_name }}</td>
                            <td>{{ $sale->invoice_number ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($sale->invoicedate)->format('F d, Y') }}</td>
                            <td>
                                <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info btn-smaller">View</a>
                                <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-smaller">Edit</a>
                                <a href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success btn-smaller">Invoice</a>
                                <a href="{{ route('sales.perform', $sale->id) }}" class="btn btn-success btn-smaller">Perform</a>
                                <a href="{{ route('sales.generatePO', $sale->id) }}" class="btn btn-secondary btn-smaller">PO</a>
                            </td>
                            
                            <!-- Add this CSS somewhere in your Blade or main CSS file -->
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
    </section>
</div>
@endsection

@section('scripts')
@include('layouts.js_css_datatable')
@endsection
