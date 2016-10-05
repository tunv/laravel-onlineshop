@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Permisson list :: @parent @endsection

{{-- Content --}}
@section('main')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Permission Management</h1>
        <div class="pull-right">
            {!! Breadcrumbs::render('admin.user.index') !!}
        </div>
    </div>
</div>
<!-- errors message and success message -->
@include('errors.list')
<!-- end errors messge and success message -->

<div class="row tab-search">
    <div class="col-md-3">
        <!-- @permission('role-create')
        <a href="{{ route('admin.system.role.create') }}" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i>Add new role</a>
        @endpermission -->
        <a href="{{ route('admin.system.role.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Add new role</a>
    </div>
    <form method="GET" action="" accept-charset="UTF-8" id="users-form">
        <div class="col-md-9">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" value="" placeholder="Search for users...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="search-users-btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                                    </span>
            </div>
        </div>
    </form>
</div>


<div class="table-responsive top-border-table" id="role-table-wrapper">
    <!-- table -->
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Actions</th>
                    <th>Name</th>
                    <th>Display name</th>
                    <th>Level</th>
                    <th>Description</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td class="text-center">
                            
                            <a href="{{ route('admin.system.role.show',['id' => $role->id]) }}" class="btn btn-success btn-circle" title="">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>

                            @permission('role-edit')
                            <a href="{{ route('admin.system.role.show',['id' => $role->id]) }}" class="btn btn-primary btn-circle edit">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            @endpermission

                            @permission('role-delete')
                            <a href="https://demo.vanguardapp.io/user/1280/delete" class="btn btn-danger btn-circle">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                            @endpermission
                        </td>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td>
                            {{ $role->display_name }}
                        </td>
                        <td>{{ $role->level }}</td>
                        <td>
                            {{ $role->description }}
                        </td>
                    </tr>
                @endforeach
            </table>
            <!-- table end -->
    <!-- paging -->
    {!! $roles->render() !!}
    <!-- end paging-->
</div>

@endsection