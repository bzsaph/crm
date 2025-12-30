@extends('layouts.adminapp')
@section('content')
<div class="container-fluid">
    <section class="section-container">
        <div class="content-wrapper">
            <h2 class="mb-4">Edit Sale</h2>

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

                <!-- Sale Info -->
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Invoice Date</label>
                        <input type="date" name="invoicedate" class="form-control" 
                               value="{{ old('invoicedate', $sale->invoicedate) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Client</label>
                        <select name="client_id" id="client_id" class="form-control" required>
                            <option value="">Select Client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" 
                                    {{ old('client_id', $sale->client_id) == $client->id ? 'selected' : '' }}
                                    data-tin="{{ $client->tinnumber }}">
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Company TIN</label>
                        <input type="text" name="company_tin" id="company_tin" class="form-control" 
                               value="{{ old('company_tin', $sale->soldProducts->first()->company_tin ?? '') }}" readonly>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Currency</label>
                        <input type="text" name="currency" class="form-control" 
                               value="{{ old('currency', $sale->soldProducts->first()->currency ?? 'RWF') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Sale Type</label>
                        <select name="sale_type" class="form-control">
                            <option value="NORMAL" {{ old('sale_type', $sale->soldProducts->first()->sale_type ?? '') == 'NORMAL' ? 'selected' : '' }}>NORMAL</option>
                            <option value="INVOICE" {{ old('sale_type', $sale->soldProducts->first()->sale_type ?? '') == 'INVOICE' ? 'selected' : '' }}>INVOICE</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Discount Amount</label>
                        <input type="number" step="0.01" name="discount_amount" class="form-control"
                               value="{{ old('discount_amount', $sale->soldProducts->first()->discount_amount ?? 0) }}">
                    </div>
                </div>

                <!-- Products Table -->
                <div class="mb-3">
                    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        + Add Product
                    </button>

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
                            @php
                                $oldProducts = old('products', $sale->soldProducts->toArray());
                            @endphp
                            @foreach ($oldProducts as $index => $product)
                                <tr class="product">
                                    <td>
                                        <select name="products[{{ $index }}][stock_id]" class="form-control stock_id" required>
                                            <option value="">Select a product</option>
                                            @foreach ($stocks as $stock)
                                                <option value="{{ $stock->id }}" 
                                                    {{ $product['stock_id'] == $stock->id ? 'selected' : '' }}>
                                                    {{ $stock->item_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="hidden" name="products[{{ $index }}][id]" 
                                               value="{{ $product['id'] ?? '' }}">
                                        <input type="number" name="products[{{ $index }}][quantity]" 
                                               class="form-control quantity" 
                                               value="{{ $product['quantity'] ?? 1 }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="products[{{ $index }}][unit_price]" 
                                               class="form-control unit_price" step="0.01"
                                               value="{{ $product['unit_price'] ?? 0 }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="products[{{ $index }}][total_price]" 
                                               class="form-control total_price" step="0.01" 
                                               value="{{ $product['total_price'] ?? 0 }}" readonly>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger remove-product">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-success">Update Sale</button>
            </form>
        </div>
    </section>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Add Product</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label class="form-label">Product</label>
                    <select id="modalProductSelect" class="form-control">
                        <option value="">Select Product</option>
                        @foreach ($stocks as $stock)
                            <option value="{{ $stock->id }}" data-price="{{ $stock->unit_price }}">
                                {{ $stock->item_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Unit Price</label>
                    <input type="number" id="modalUnitPrice" class="form-control" step="0.01">
                </div>
                <div class="mb-2">
                    <label class="form-label">Quantity</label>
                    <input type="number" id="modalQuantity" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Total</label>
                    <input type="number" id="modalTotalPrice" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer p-2">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm" id="modalAddProductBtn">Add</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update total price for table rows
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

    // Remove product row
    document.querySelector('#products-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-product')) {
            e.target.closest('tr').remove();
        }
    });

    // Modal functionality
    const productSelect = document.getElementById('modalProductSelect');
    const unitPrice = document.getElementById('modalUnitPrice');
    const quantity = document.getElementById('modalQuantity');
    const totalPrice = document.getElementById('modalTotalPrice');
    const table = document.getElementById('products-container').querySelector('tbody');

    function calculateModalTotal() {
        totalPrice.value = ((quantity.value || 0) * (unitPrice.value || 0)).toFixed(2);
    }

    productSelect.addEventListener('change', () => {
        unitPrice.value = productSelect.selectedOptions[0]?.dataset.price || 0;
        calculateModalTotal();
    });

    quantity.addEventListener('input', calculateModalTotal);
    unitPrice.addEventListener('input', calculateModalTotal);

    document.getElementById('modalAddProductBtn').addEventListener('click', () => {
        if (!productSelect.value || quantity.value <= 0) return alert('Invalid input');

        const index = table.querySelectorAll('tr').length;
        const row = document.createElement('tr');
        row.classList.add('product');
        row.innerHTML = `
            <td>
                <select name="products[${index}][stock_id]" class="form-control stock_id" required>
                    <option value="${productSelect.value}" selected>${productSelect.selectedOptions[0].text}</option>
                </select>
            </td>
            <td>
                <input type="hidden" name="products[${index}][id]" value="">
                <input type="number" name="products[${index}][quantity]" class="form-control quantity" value="${quantity.value}" required>
            </td>
            <td>
                <input type="number" name="products[${index}][unit_price]" class="form-control unit_price" step="0.01" value="${unitPrice.value}" required>
            </td>
            <td>
                <input type="number" name="products[${index}][total_price]" class="form-control total_price" step="0.01" value="${totalPrice.value}" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-product">Remove</button>
            </td>
        `;
        table.appendChild(row);

        productSelect.value = unitPrice.value = quantity.value = totalPrice.value = '';
        updateTotalPrice();
        var modalEl = document.getElementById('addProductModal');
        var modal = bootstrap.Modal.getInstance(modalEl);
        modal.hide();
    });

    // Set company TIN on client change
    const clientSelect = document.getElementById('client_id');
    const tinInput = document.getElementById('company_tin');
    clientSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        tinInput.value = selectedOption.dataset.tin || '';
    });

    updateTotalPrice();
});
</script>
@endsection
