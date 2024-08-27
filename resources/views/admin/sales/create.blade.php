@extends('layouts.adminapp')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Record Sale</h2>

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

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <!-- Client Selection -->
        <div class="mb-4">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" id="client_id" class="form-select" required>
                <option value="">Select a client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Buttons at the Top -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button type="submit" class="btn btn-primary">Record Sale</button>
            <button type="button" id="add-product" class="btn btn-secondary btn-sm">Add Another Product</button>
        </div>

        <div id="products-container">
            <div class="product mb-3 border p-3 rounded">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label for="stock_id" class="form-label">Product</label>
                        <select name="products[0][stock_id]" class="form-select form-select-sm stock_id" required>
                            <option value="">Select a product</option>
                            @foreach($stocks as $stock)
                                <option value="{{ $stock->id }}">{{ $stock->item_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="products[0][quantity]" class="form-control form-control-sm quantity" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="unit_price" class="form-label">Unit Price</label>
                        <input type="number" name="products[0][unit_price]" class="form-control form-control-sm unit_price" step="0.01" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="number" name="products[0][total_price]" class="form-control form-control-sm total_price" step="0.01" readonly>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateTotalPrice() {
            document.querySelectorAll('.product').forEach(function(productDiv) {
                const quantityInput = productDiv.querySelector('.quantity');
                const unitPriceInput = productDiv.querySelector('.unit_price');
                const totalPriceInput = productDiv.querySelector('.total_price');
                
                const calculateTotal = () => {
                    const quantity = parseFloat(quantityInput.value) || 0;
                    const unitPrice = parseFloat(unitPriceInput.value) || 0;
                    totalPriceInput.value = (quantity * unitPrice).toFixed(2);
                };
                
                quantityInput.addEventListener('input', calculateTotal);
                unitPriceInput.addEventListener('input', calculateTotal);
            });
        }

        document.getElementById('add-product').addEventListener('click', function() {
            const container = document.getElementById('products-container');
            const index = container.getElementsByClassName('product').length;

            const newProductHtml = `
                <div class="product mb-3 border p-3 rounded">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="stock_id" class="form-label">Product</label>
                            <select name="products[${index}][stock_id]" class="form-select form-select-sm stock_id" required>
                                <option value="">Select a product</option>
                                @foreach($stocks as $stock)
                                    <option value="{{ $stock->id }}">{{ $stock->item_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="products[${index}][quantity]" class="form-control form-control-sm quantity" required>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="unit_price" class="form-label">Unit Price</label>
                            <input type="number" name="products[${index}][unit_price]" class="form-control form-control-sm unit_price" step="0.01" required>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="number" name="products[${index}][total_price]" class="form-control form-control-sm total_price" step="0.01" readonly>
                        </div>
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
