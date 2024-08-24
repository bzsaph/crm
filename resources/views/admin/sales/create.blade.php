@extends('layouts.adminapp')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Record Sale</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" id="client_id" class="form-select" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="products-container">
            <div class="product mb-3">
                <label for="stock_id" class="form-label">Product</label>
                <select name="products[0][stock_id]" class="form-select stock_id" required>
                    @foreach($stocks as $stock)
                        <option value="{{ $stock->id }}">{{ $stock->item_name }}</option>
                    @endforeach
                </select>

                <label for="quantity" class="form-label mt-2">Quantity</label>
                <input type="number" name="products[0][quantity]" class="form-control quantity" required>

                <label for="total_price" class="form-label mt-2">Total Price</label>
                <input type="number" name="products[0][total_price]" class="form-control total_price" step="0.01" required>
            </div>
        </div>

        <button type="button" id="add-product" class="btn btn-secondary mb-3">Add Another Product</button>
        <button type="submit" class="btn btn-primary">Record Sale</button>
    </form>
</div>

<script>
    document.getElementById('add-product').addEventListener('click', function() {
        var container = document.getElementById('products-container');
        var index = container.getElementsByClassName('product').length;

        var newProductHtml = `
            <div class="product mb-3">
                <label for="stock_id" class="form-label">Product</label>
                <select name="products[${index}][stock_id]" class="form-select stock_id" required>
                    @foreach($stocks as $stock)
                        <option value="{{ $stock->id }}">{{ $stock->item_name }}</option>
                    @endforeach
                </select>

                <label for="quantity" class="form-label mt-2">Quantity</label>
                <input type="number" name="products[${index}][quantity]" class="form-control quantity" required>

                <label for="total_price" class="form-label mt-2">Total Price</label>
                <input type="number" name="products[${index}][total_price]" class="form-control total_price" step="0.01" required>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', newProductHtml);
    });
</script>
@endsection
