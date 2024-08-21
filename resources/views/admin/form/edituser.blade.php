@extends('layouts.adminapp')
@section('content')

 <!-- Main section-->
 <section class="section-container">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update user') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/updateuser">
                        @method('PATCH')
                        @can('user-update')
                        @include("admin.form.registerform")
                        @else
                        <p>You don't have permission of user-update  </p>
                        @endcan

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
