@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
        <div class="content-heading">
            <div>Edit Company</div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Company Details</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Company Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $company->name }}" required>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $company->address }}" required>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $company->phone }}" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $company->email }}" required>
                            </div>
                        </div>

                        <!-- Website -->
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ $company->website }}">
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status" required>
                                    <option value="active" {{ $company->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="closed" {{ $company->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Logo</label>
                            <div class="col-md-6">
                                <input type="file" id="logo" name="logo" class="form-control" onchange="resizeAndPreviewImage(event)">
                            </div>
                            <div class="col-md-3">
                                @if($company->logo)

                                <img id="logoPreview" src="{{ asset('public/logos/' . $company->logo) }}" alt="Company Logo" style="width: 100px; height: auto;">
                            @else
                            <div class="text-center">
                                <img src="#" id="logoPreview" class="rounded" alt="Image Preview" style="width: 100px; height: auto; display: none;">
                              </div>
                                
                            @endif
                            
                            <div id="sizeDisplay" class=""></div>
                            </div>
                        </div>
                        

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Company') }}
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
