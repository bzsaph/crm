@extends('layouts.adminapp')

@section('content')

<section class="section-container">
    <div class="content-wrapper">
        <div class="content-heading">
            <div>Edit User</div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit User</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Grade -->
                        <div class="form-group row">
                            <label for="grade" class="col-md-4 col-form-label text-md-right">Grade</label>
                            <div class="col-md-6">
                                <select id="grade" class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                                    <option value="0" {{ $user->grade == '0' ? 'selected' : '' }}>Student</option>
                                    <option value="1" {{ $user->grade == '1' ? 'selected' : '' }}>Supervisor</option>
                                </select>
                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Company -->
                        <div class="form-group row">
                            <label for="company_id" class="col-md-4 col-form-label text-md-right">Company</label>
                            <div class="col-md-6">
                                <select id="company_id" class="form-control" name="company_id[]" >
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ in_array($company->id, $userCompanyIds) ? 'selected' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                                
                                
                                @error('company_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Roles -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Roles</label>
                            <div class="col-md-6">
                                @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" value="{{ $role->id }}" name="roles[]" id="role-{{ $role->id }}" {{ in_array($role->id, $userRoleIds) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
