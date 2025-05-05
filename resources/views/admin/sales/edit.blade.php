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
            <select name="client_id" id="client_id" class="form-select form-control" required>
                <option value="">Select a client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $sale->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Products Table -->
        <table class="table table-bordered" id="products-container">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->soldProducts as $index => $product)
                <tr class="product">
                    <td>
                        <select name="products[{{ $index }}][stock_id]" class=" form-control form-select stock_id" required>
                            <option value="">Select a product</option>
                            @foreach($stocks as $stock)
                                <option value="{{ $stock->id }}" {{ $product->stock_id == $stock->id ? 'selected' : '' }}>{{ $stock->item_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="hidden" name="products[{{ $index }}][id]" value="{{ $product->id }}">
                        <input type="number" name="products[{{ $index }}][quantity]" class="form-control quantity" value="{{ $product->quantity }}" required>
                    </td>
                    <td>
                        <input type="number" name="products[{{ $index }}][unit_price]" class="form-control unit_price" step="0.01" value="{{ $product->unit_price }}" required>
                    </td>
                    <td>
                        <input type="number" name="products[{{ $index }}][total_price]" class="form-control total_price" step="0.01" value="{{ $product->total_price }}" readonly>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-product">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Sale</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update the total price for each product based on quantity and unit price
        function updateTotalPrice() {
            document.querySelectorAll('.product').forEach(function(row) {
                const quantityInput = row.querySelector('.quantity');
                const unitPriceInput = row.querySelector('.unit_price');
                const totalPriceInput = row.querySelector('.total_price');

                function calculate() {
                    const quantity = parseFloat(quantityInput.value) || 0;
                    const unitPrice = parseFloat(unitPriceInput.value) || 0;
                    totalPriceInput.value = (quantity * unitPrice).toFixed(2);
                }

                quantityInput.addEventListener('input', calculate);
                unitPriceInput.addEventListener('input', calculate);
            });
        }

      

        document.querySelector('#products-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-product')) {
                e.target.closest('tr').remove();
            }
        });

        updateTotalPrice();
    });


    
</script>

@endsection
