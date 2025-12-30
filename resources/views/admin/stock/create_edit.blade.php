@extends('layouts.adminapp')

@section('content')
<div class="container-fluid">
    <section class="section-container">
        <div class="content-wrapper">
            <h3 class="mb-3">{{ isset($stock) ? 'Edit' : 'Add' }} Stock</h3>

            @if ($errors->any())
                <div class="alert alert-danger py-1">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($stock) ? route('stock.update', $stock->id) : route('stock.store') }}" method="POST">
                @csrf
                @isset($stock)
                    @method('PUT')
                @endisset

                <div class="row g-1">
                    <!-- Item Name -->
                    <div class="col-md-6 mb-2">
                        <label for="item_name" class="form-label small">Item Name</label>
                        <input type="text" class="form-control form-control-sm py-1" id="item_name" name="item_name"
                               value="{{ old('item_name', $stock->item_name ?? '') }}" required>
                    </div>

                    <!-- Item Code -->
                    <div class="col-md-6 mb-2">
                        <label for="itemCd" class="form-label small">Item Code</label>
                        <input type="text" class="form-control form-control-sm py-1" id="itemCd" name="itemCd"
                               value="{{ old('itemCd', $stock->itemCd ?? '') }}">
                    </div>

                    <!-- Item Class Code -->
                    <div class="col-md-6 mb-2">
                        <label for="itemClsCd" class="form-label small">Item Class Code</label>
                        <input type="text" class="form-control form-control-sm py-1" id="itemClsCd" name="itemClsCd"
                               value="{{ old('itemClsCd', $stock->itemClsCd ?? '') }}">
                    </div>

                    <!-- Stock In -->
                    <div class="col-md-3 mb-2">
                        <label for="quantity" class="form-label small">Stock In</label>
                        <input type="number" class="form-control form-control-sm py-1" id="quantity" name="quantity" min="0"
                               value="{{ old('quantity', $stock->quantity ?? 0) }}" required>
                    </div>

                    <!-- Remaining Stock -->
                    <div class="col-md-3 mb-2">
                        <label for="remaining_stock" class="form-label small">Remaining</label>
                        <input type="number" class="form-control form-control-sm py-1" id="remaining_stock" name="remaining_stock"
                               value="{{ old('remaining_stock', $stock->remaining_stock ?? 0) }}" readonly>
                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-2">
                        <label for="description" class="form-label small">Description</label>
                        <textarea class="form-control form-control-sm py-1" id="description" name="description" rows="1">{{ old('description', $stock->description ?? '') }}</textarea>
                    </div>

                    <!-- Tax Code -->
                    <div class="col-md-6 mb-2">
                        <label for="taxCode" class="form-label small">Tax Code</label>
                        <select class="form-control form-control-sm py-1" name="taxCode" id="taxCode" required>
                            <option value="">-- Select Tax Code --</option>
                            @foreach($taxCodes as $tax)
                                <option value="{{ $tax->name }}" 
                                    {{ old('taxCode', $stock->taxCode ?? '') == $tax->name ? 'selected' : '' }}>
                                    {{ $tax->name }} - {{ $tax->description }} ({{ $tax->rate }}%)
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <input type="hidden" name="loged_in_id" value="{{ auth()->id() }}">

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-sm py-1 px-2">{{ isset($stock) ? 'Update' : 'Add' }}</button>
                    <a href="{{ route('stock.index') }}" class="btn btn-secondary btn-sm py-1 px-2">Cancel</a>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
