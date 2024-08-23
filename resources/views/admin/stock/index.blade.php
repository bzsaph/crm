<!-- resources/views/admin/stock/index.blade.php -->
@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Stock Intake</h1>
        <a href="{{ route('stock.create') }}" class="btn btn-primary">Add New Stock</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Remaining Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock)
                    <tr>
                        <td>{{ $stock->item_name }}</td>
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->remaining_stock }}</td>
                        <td>
                            <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('stock.sold', $stock->id) }}" class="btn btn-success">Mark as Sold</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
