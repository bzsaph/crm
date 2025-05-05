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

    <!-- Trigger Modal Button -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#productModal">
        Add Product
    </button>

    <!-- Client Selection -->
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="unit-price-modal" class="form-label">Unit Price</label>
            <input type="date" name="invoicedate" class="form-control"  required >
        </div>
        <div class="mb-3">
            <select name="client_id" id="client_id" class="form-select form-control" required>
                <option value="">Select a client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Products List Display -->
        <div class="mb-4">
            <label class="form-label">Products List</label>
            <ul id="products-list" class="list-group"></ul>
        </div>

        <!-- Hidden Input for Product Data -->
        <input type="hidden" name="products" id="products-data">

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Record Sale</button>
    </form>
</div>

<!-- Modal for Adding Product -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="product-select-modal" class="form-label">Product</label>
                    <select id="product-select-modal" class="form-select form-control" required>
                        <option value="">Select a product</option>
                        @foreach($stocks as $stock)
                            <option value="{{ $stock->id }}" data-unit-price="{{ $stock->unit_price }}">
                                {{ $stock->item_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="unit-price-modal" class="form-label">Unit Price</label>
                    <input type="number" id="unit-price-modal" class="form-control" step="0.01" >
                </div>
                <div class="mb-3">
                    <label for="quantity-modal" class="form-label">Quantity</label>
                    <input type="number" id="quantity-modal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="total-price-modal" class="form-label">Total Price</label>
                    <input type="number" id="total-price-modal" class="form-control" step="0.01" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="add-product-btn" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', () => {
    const productSelectModal = document.getElementById('product-select-modal');
    const quantityModal = document.getElementById('quantity-modal');
    const unitPriceModal = document.getElementById('unit-price-modal');
    const totalPriceModal = document.getElementById('total-price-modal');
    const addProductBtn = document.getElementById('add-product-btn');
    const productsList = document.getElementById('products-list');
    const productsDataInput = document.getElementById('products-data');

    let products = [];

    // Update Unit Price and Total Price
    productSelectModal.addEventListener('change', () => {
        const selectedOption = productSelectModal.selectedOptions[0];
        unitPriceModal.value = selectedOption.dataset.unitPrice || 0;
        updateModalTotalPrice();
    });

    quantityModal.addEventListener('input', updateModalTotalPrice);

    function updateModalTotalPrice() {
        const quantity = parseFloat(quantityModal.value) || 0;
        const unitPrice = parseFloat(unitPriceModal.value) || 0;
        totalPriceModal.value = (quantity * unitPrice).toFixed(2);
    }

    // Add Product to List
    addProductBtn.addEventListener('click', () => {
        const productId = productSelectModal.value;
        const productName = productSelectModal.selectedOptions[0]?.text || '';
        const quantity = parseFloat(quantityModal.value) || 0;
        const unitPrice = parseFloat(unitPriceModal.value) || 0;
        const totalPrice = parseFloat(totalPriceModal.value) || 0;

        if (!productId || quantity <= 0) {
            alert('Please select a product and enter a valid quantity.');
            return;
        }

        // Add product to the products array
        products.push({
            product_id: productId,
            product_name: productName,
            quantity,
            unit_price: unitPrice,
            total_price: totalPrice
        });

        // Update the hidden input field with the serialized product data
        productsDataInput.value = JSON.stringify(products);

        // Debugging: Log the products data to the console
        console.log(productsDataInput.value);  // <-- This is the key

        // Update the products list UI
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.textContent = `${productName} - Qty: ${quantity}, Unit Price: ${unitPrice}, Total: ${totalPrice}`;
        productsList.appendChild(listItem);

        // Reset modal inputs
        productSelectModal.value = '';
        quantityModal.value = '';
        unitPriceModal.value = '';
        totalPriceModal.value = '';

        // Close the modal
        $('#productModal').modal('hide');
    });
});
</script>
@endsection
