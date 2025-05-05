@extends('layouts.adminapp')

@section('content')
<section class="section-container">
    <div class="content-wrapper">
        <div class="content-heading">
            <div>View Company Details</div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Company Information</div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Company Name:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $company->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Address:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $company->address }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Phone:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $company->phone }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Email:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $company->email }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Website:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $company->website }}</p>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Bank name:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $company->bkname }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Account account owner:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ ucfirst($company->acowner) }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Account account owner:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ ucfirst($company->bkaccount) }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Notes:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ ucfirst($company->notes) }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Status:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ ucfirst($company->status) }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Created By:</label>
                        <div class="col-md-6">
                            <p class="form-control-plaintext">{{ $company->createdBy ? $company->createdBy->name : 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit Company</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
