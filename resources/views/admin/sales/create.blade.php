@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Record Sale</h5>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#productModal">
                        + Add Product
                    </button>
                </div>

                <div class="card-body">
                    {{-- Errors --}}
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

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Invoice Date</label>
                                <input type="date" name="invoicedate"
                                       class="form-control"
                                       value="{{ old('invoicedate') }}"
                                       required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Client</label>
                                <select name="client_id" id="client_id" class="form-control" required>
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}"
                                                data-tin="{{ $client->tinnumber }}"
                                                {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                            {{ $client->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Company TIN</label>
                                <input type="text" name="company_tin" id="company_tin"
                                       class="form-control"
                                       value="{{ old('company_tin') }}" readonly>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="form-label">Currency</label>
                                <input type="text" name="currency"
                                       class="form-control"
                                       value="{{ old('currency','RWF') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Sale Type</label>
                                <select name="sale_type" class="form-control">
                                    <option value="NORMAL" {{ old('sale_type')=='NORMAL'?'selected':'' }}>NORMAL</option>
                                    <option value="INVOICE" {{ old('sale_type')=='INVOICE'?'selected':'' }}>INVOICE</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Discount Amount</label>
                                <input type="number" step="0.01"
                                       name="discount_amount"
                                       class="form-control"
                                       value="{{ old('discount_amount') }}">
                            </div>
                        </div>

                        {{-- Products Table --}}
                        <div class="table-responsive mt-4">
                            <table class="table table-sm table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th width="80">Qty</th>
                                        <th width="120">Unit</th>
                                        <th width="120">Total</th>
                                        <th width="40"></th>
                                    </tr>
                                </thead>
                                <tbody id="products-table"></tbody>
                            </table>
                        </div>

                        <input type="hidden" name="products" id="products-data" value='{{ old("products") }}'>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">
                                Save Sale
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- PRODUCT MODAL --}}
        <div class="modal fade" id="productModal" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Add Product</h6>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Product</label>
                            <select id="productSelect" class="form-control">
                                <option value="">Select</option>
                                @foreach($stocks as $stock)
                                    <option value="{{ $stock->id }}"
                                            data-price="{{ $stock->unit_price }}">
                                        {{ $stock->item_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Unit Price</label>
                            <input type="number" step="0.01" id="unitPrice" class="form-control">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Quantity</label>
                            <input type="number" id="quantity" class="form-control">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Total</label>
                            <input type="number" id="totalPrice" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="modal-footer p-2">
                        <button class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-sm btn-primary" id="addProductBtn">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const productSelect = document.getElementById('productSelect');
    const unitPrice = document.getElementById('unitPrice');
    const quantity = document.getElementById('quantity');
    const totalPrice = document.getElementById('totalPrice');
    const table = document.getElementById('products-table');
    const productsInput = document.getElementById('products-data');

    let products = [];

    // 🔁 RESTORE OLD PRODUCTS
    if (productsInput.value) {
        try {
            products = JSON.parse(productsInput.value);
            products.forEach(item => {
                table.innerHTML += `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>${item.unit_price}</td>
                        <td>${item.total_price}</td>
                        <td>
                            <button class="btn btn-sm btn-danger"
                                onclick="this.closest('tr').remove()">×</button>
                        </td>
                    </tr>`;
            });
        } catch(e) {
            console.error('Invalid products JSON');
        }
    }

    function updateTotal() {
        totalPrice.value = ( (quantity.value||0) * (unitPrice.value||0) ).toFixed(2);
    }

    productSelect.addEventListener('change', () => {
        unitPrice.value = productSelect.selectedOptions[0]?.dataset.price || 0;
        updateTotal();
    });

    quantity.addEventListener('input', updateTotal);

    document.getElementById('addProductBtn').addEventListener('click', () => {
        if (!productSelect.value || quantity.value <= 0) return alert('Invalid input');

        const item = {
            product_id: productSelect.value,
            name: productSelect.selectedOptions[0].text,
            quantity: quantity.value,
            unit_price: unitPrice.value,
            total_price: totalPrice.value
        };

        products.push(item);
        productsInput.value = JSON.stringify(products);

        table.innerHTML += `
            <tr>
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>${item.unit_price}</td>
                <td>${item.total_price}</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">×</button>
                </td>
            </tr>
        `;

        $('#productModal').modal('hide');
        productSelect.value = quantity.value = unitPrice.value = totalPrice.value = '';
    });

    // Auto-fill company TIN
    const clientSelect = document.getElementById('client_id');
    const tinInput = document.getElementById('company_tin');
    clientSelect.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        tinInput.value = selectedOption.dataset.tin || '';
    });
});
</script>
@endsection
