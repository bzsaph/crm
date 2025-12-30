<!-- resources/views/admin/stock/index.blade.php -->

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
                    <h1>Stock Intake</h1>

                    <div> <a href="{{ route('stock.create') }}" class="btn btn-primary">Add New Stock</a>
                        <small data-localize="dashboard.WELCOME"></small>
                    </div>
                    <!-- START Language list-->
                    
                    <!-- END Language list-->
                </div>
                <!-- START cards box-->
              
                
              <table class="table table-sm table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Item</th>
            <th>Code</th>
            <th>Class</th>
            <th>Qty</th>
            <th>Remain</th>
            <th>Tax</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->item_name }}</td>
                <td>{{ $stock->itemCd ?? '-' }}</td>
                <td>{{ $stock->itemClsCd ?? '-' }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->remaining_stock }}</td>
                <td>{{ $stock->taxCode ?? '-' }}</td>
                <td>
                    <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{ route('stock.sold', $stock->id) }}" class="btn btn-success btn-sm">Sold</a>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


            </div>
        </section>
    </div>
@endsection

