@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Client</h5>
                </div>

                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf

                    <div class="row g-2">
                        <!-- Name -->
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-sm" value="{{ old('name') }}" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-sm" value="{{ old('email') }}" required>
                        </div>

                        <!-- TIN Number -->
                        <div class="col-md-4">
                            <label for="tinnumber" class="form-label">TIN Number</label>
                            <input type="text" id="tinnumber" name="tinnumber" class="form-control form-control-sm" value="{{ old('tinnumber') }}" required>
                        </div>

                        <!-- Address -->
                        <div class="col-md-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" name="address" class="form-control form-control-sm" value="{{ old('address') }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control form-control-sm" value="{{ old('phone') }}">
                        </div>

                        <!-- Managed By -->
                        <div class="col-md-4">
                            <label for="managed_by" class="form-label">Managed By</label>
                            <select id="managed_by" name="managed_by" class="form-control form-control-sm">
                                <option value="">Select User</option>
                                @foreach($activeUsers as $user)
                                    <option value="{{ $user->id }}" {{ old('managed_by') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control form-control-sm">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Client Type -->
                        <div class="col-md-4">
                            <label for="client_type" class="form-label">Client Type</label>
                            <select id="client_type" name="client_type" class="form-control form-control-sm">
                                <option value="vendor" {{ old('client_type') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                <option value="client" {{ old('client_type') == 'client' ? 'selected' : '' }}>Client</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Create Client</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
