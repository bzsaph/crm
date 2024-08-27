@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
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
            <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Grade') }}</label>
            <div class="col-md-6">
                <select id="grade" class="form-control @error('grade') is-invalid @enderror" name="grade" required>
                    <option value="0" disabled>Choose</option>
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

        <!-- Companies -->
        <div class="form-group row">
            <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>
            <div class="col-md-6">
                <select id="company_id" class="form-control @error('company_id') is-invalid @enderror" name="company_id[]" multiple required>
                    @foreach($companies as $company)
                        {{-- <option value="{{ $company->id }}" {{ in_array($company->id, $userCompanies) ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option> --}}
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
            <label class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>
            <div class="col-md-6">

                @foreach ($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $role->id }}" name="roles[]" id="role-{{ $role->id }}"
                        {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                @endforeach
               
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save Changes') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
