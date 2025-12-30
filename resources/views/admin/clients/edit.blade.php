@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>Edit Client</h5>
                </div>

                <form action="{{ route('clients.update', $client->id) }}" method="POST" class="p-3">
                    @csrf
                    @method('PUT')

                    <div class="row g-2">
                        <!-- Name -->
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-sm" value="{{ old('name', $client->name) }}" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-sm" value="{{ old('email', $client->email) }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control form-control-sm" value="{{ old('phone', $client->phone) }}">
                        </div>

                        <!-- Managed By -->
                        <div class="col-md-4">
                            <label for="managed_by" class="form-label">Managed By</label>
                            <select id="managed_by" name="managed_by" class="form-control form-control-sm">
                                <option value="">Select User</option>
                                @foreach($activeUsers as $user)
                                    <option value="{{ $user->id }}" {{ $client->managed_by == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control form-control-sm">
                                <option value="1" {{ $client->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $client->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Client Type -->
                        <div class="col-md-4">
                            <label for="client_type" class="form-label">Client Type</label>
                            <select id="client_type" name="client_type" class="form-control form-control-sm">
                                <option value="vendor" {{ $client->client_type == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                <option value="client" {{ $client->client_type == 'client' ? 'selected' : '' }}>Client</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Update Client</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
