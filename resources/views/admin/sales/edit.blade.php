@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Edit Sale</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client_id">Client</label>
            <select id="client_id" name="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $sale->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="stock_id">Stock</label>
            <select id="stock_id" name="stock_id" class="form-control" required>
                @foreach($stocks as $stock)
                    <option value="{{ $stock->id }}" {{ $sale->stock_id == $stock->id ? 'selected' : '' }}>
                        {{ $stock->item_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $sale->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" id="total_price" name="total_price" class="form-control" value="{{ $sale->total_price }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Sale</button>
    </form>
</div>
@endsection
