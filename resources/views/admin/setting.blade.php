@extends('layouts.adminapp')
 @if ($message = Session::get('message'))
                            <div class="alert alert-success">
                            <ul>
                                    {{ $message }}
                            </ul>
                            </div>
                            @endif
        <div class="container-fluid">
@section('content')
<!-- Main section-->
<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="content-heading">
            <div>Settings

            </div>
        </div>

        <!-- START row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">



                        <table id="permissions-table" class="table table-responsive table-hover table_wrapper">

                                @foreach ($role as $roles )
                                <thead>
                                    <tr>
                                        <th></th>
                                        @foreach ($permissions as $permi )
                                        <th>{{$permi->name}}</th>
                                        @endforeach
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form class="form-horizontal" action="roleupdate/{{$roles->id}}" method="POST">
                                        @csrf

                                        <input type="hidden" name="role_id" value="4">
                                        <tr>
                                            <th>{{$roles->name}}</th>

                                            @foreach ($permissions as $permi )
                                                <td>
                                                    <input type="checkbox" name="permissions[]" value="{{ $permi->id }}" @if($roles->permissions->contains($permi)) checked @endif>
                                                   <span class="perm-name"></span><br></td>
                                            @endforeach
                                            <th></th>
                                            <td><input type="submit" value="Save Role" class="btn btn-primary"></td>
                                        </tr>
                                    </form>
                                </tbody>
                                @endforeach

                        </table>

                </div>
            </div>
        </div>
        <!-- END row-->
    </div>
</section>

@endsection
