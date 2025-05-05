@extends('layouts.adminapp')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Sale</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Client Selection -->
        <div class="mb-4">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" id="client_id" class="form-select" required>
                <option value="">Select a client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $sale->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Products Container -->
        <div id="products-container">
            @foreach($sale->soldProducts as $index => $product)
                <div class="product mb-4 card p-3 rounded">
                    <h5 class="mb-3 card-title">Product Details</h5>
                    <div class="mb-3">
                        <label for="stock_id" class="form-label">Product</label>
                        <select name="products[{{ $index }}][stock_id]" class="form-select stock_id" required>
                            <option value="">Select a product</option>
                            @foreach($stocks as $stock)
                                <option value="{{ $stock->id }}" {{ $product->stock_id == $stock->id ? 'selected' : '' }}>{{ $stock->item_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="products[{{ $index }}][quantity]" class="form-control quantity" value="{{ $product->quantity }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Unit Price</label>
                        <input type="number" name="products[{{ $index }}][unit_price]" class="form-control unit_price" step="0.01" value="{{ $product->unit_price }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="number" name="products[{{ $index }}][total_price]" class="form-control total_price" step="0.01" value="{{ $product->total_price }}" readonly>
                    </div>
                </div>
            @endforeach
            <button type="button" id="add-product" class="btn btn-secondary mb-3">Add Another Product</button>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Sale</button>
        </div>

        <!-- Add Product Button -->
       
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update the total price for each product based on quantity and unit price
        function updateTotalPrice() {
            document.querySelectorAll('.product').forEach(function(productDiv) {
                const quantityInput = productDiv.querySelector('.quantity');
                const unitPriceInput = productDiv.querySelector('.unit_price');
                const totalPriceInput = productDiv.querySelector('.total_price');
                
                quantityInput.addEventListener('input', function() {
                    const quantity = parseFloat(quantityInput.value) || 0;
                    const unitPrice = parseFloat(unitPriceInput.value) || 0;
                    totalPriceInput.value = (quantity * unitPrice).toFixed(2);
                });

                unitPriceInput.addEventListener('input', function() {
                    const quantity = parseFloat(quantityInput.value) || 0;
                    const unitPrice = parseFloat(unitPriceInput.value) || 0;
                    totalPriceInput.value = (quantity * unitPrice).toFixed(2);
                });
            });
        }

        // Add another product row dynamically
        document.getElementById('add-product').addEventListener('click', function() {
            var container = document.getElementById('products-container');
            var index = container.getElementsByClassName('product').length;

            var newProductHtml = `
                <div class="product mb-4 card p-3 rounded">
                    <h5 class="mb-3 card-title">Product Details</h5>
                    <div class="mb-3">
                        <label for="stock_id" class="form-label">Product</label>
                        <select name="products[${index}][stock_id]" class="form-select stock_id" required>
                            <option value="">Select a product</option>
                            @foreach($stocks as $stock)
                                <option value="{{ $stock->id }}">{{ $stock->item_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="products[${index}][quantity]" class="form-control quantity" required>
                    </div>

                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Unit Price</label>
                        <input type="number" name="products[${index}][unit_price]" class="form-control unit_price" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="number" name="products[${index}][total_price]" class="form-control total_price" step="0.01" readonly>
                    </div>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', newProductHtml);
            updateTotalPrice();
        });

        updateTotalPrice();
    });
</script>
@endsection
