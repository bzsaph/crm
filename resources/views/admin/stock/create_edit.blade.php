<!-- resources/views/admin/stock/create_edit.blade.php -->
@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>{{ isset($stock) ? 'Edit' : 'Add' }} Stock</h1>
        <form action="{{ isset($stock) ? route('stock.update', $stock->id) : route('stock.store') }}" method="POST">
            @csrf
            @if(isset($stock))
                @method('PUT')
            @endif
        
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" value="{{ $stock->item_name ?? '' }}" required>
            </div>
        
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $stock->quantity ?? '' }}" required>
            </div>
        
            <div class="form-group">
                <label for="remaining_stock">Remaining Stock</label>
                <input type="number" class="form-control" id="remaining_stock" name="remaining_stock" value="{{ $stock->remaining_stock ?? '' }}" required>
            </div>
        
            <div class="form-group">
                <label for="loged_in_id">Logged In User ID</label>
                <input type="number" class="form-control" id="loged_in_id" name="loged_in_id" value="{{ auth()->user()->id }}" readonly>
            </div>
        
            <button type="submit" class="btn btn-primary">{{ isset($stock) ? 'Update' : 'Add' }} Stock</button>
            <a href="{{ route('stock.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
        
    </div>
@endsection
