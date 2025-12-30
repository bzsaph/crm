@extends('layouts.adminapp')
@section('content')
    <div class="container-fluid">
        <section class="section-container">
            <!-- Page content-->
            <div class="content-wrapper">
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="content-heading">
                    <div> <a href="{{ route('sales.create') }}" class="btn btn-primary">Add New Sale</a>
                        <small data-localize="dashboard.WELCOME"></small>
                    </div>
                    <!-- START Language list-->
                    <div class="ml-auto">
                        <div class="btn-group">
                            <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret" type="button"
                                data-toggle="dropdown">English</button>
                            <div class="dropdown-menu dropdown-menu-right-forced animated fadeInUpShort" role="menu">
                                <a class="dropdown-item" href="#" data-set-lang="en">English</a>

                            </div>
                        </div>
                    </div>
                    <!-- END Language list-->
                </div>
                <!-- START cards box-->
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
                                    <td>{{ \Carbon\Carbon::parse($sale->invoicedate)->format('F d, Y') }}</td>
                                    <!-- Replace with actual sale date if available -->
                                    <td>
                                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('sales.edit', $sale->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <a href="{{ route('sales.invoice', $sale->id) }}"
                                            class="btn btn-success btn-sm">Invoice</a>
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
                <!-- END cards box-->

            </div>
        </section>
    </div>
@endsection
