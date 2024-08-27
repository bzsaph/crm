@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
       <div class="content-heading">
          <div>Create Company</div>
       </div>
       <div class="container-fluid">
          <div class="card">
             <div class="card-header">
                <div class="card-title">Create a New Company</div>
             </div>
             <div class="card-body">
                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Company Name -->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Website -->
                    <div class="form-group row">
                        <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                        <div class="col-md-6">
                            <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                        <div class="col-md-6">
                            <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Logo</label>
                        <div class="col-md-6">
                            <input type="file" id="logo" name="logo" class="form-control" onchange="resizeAndPreviewImage(event)">
                        </div>
                        
                        <div class="text-center">
                            <img src="#" id="logoPreview" class="rounded" alt="Image Preview" style="width: 100px; height: auto; display: none;">
                          </div>
                            
                    
                        
                        <div id="sizeDisplay" class=""></div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Company') }}
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
