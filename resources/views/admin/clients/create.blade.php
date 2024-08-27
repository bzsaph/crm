@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Create Client</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <!-- Managed By -->
        <div class="form-group">
            <label for="managed_by">Managed By</label>
            <select id="managed_by" name="managed_by" class="form-control">
                <option value="">Select User</option>
                @foreach($activeUsers as $user)
                    <option value="{{ $user->id }}" {{ old('managed_by') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Client Type -->
        <div class="form-group">
            <label for="client_type">Client Type</label>
            <select id="client_type" name="client_type" class="form-control">
                <option value="vendor" {{ old('client_type') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                <option value="client" {{ old('client_type') == 'client' ? 'selected' : '' }}>Client</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Client</button>
    </form>
</div>
@endsection
