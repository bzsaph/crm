<!-- resources/views/admin/stock/sold.blade.php -->
@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Sold Out Stock</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Sold Quantity</th>
                    <th>Date Sold</th>
                </tr>
            </thead>
            <tbody>
                @foreach($soldItems as $item)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->sold_quantity }}</td>
                        <td>{{ $item->date_sold }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
