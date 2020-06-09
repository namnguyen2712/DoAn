@extends('layouts.backend')
@section('title','Nhóm người dùng')
@section('box-title','Danh sách người dùng thuộc nhóm quyền')
@section('box-body')

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Họ tên</th>
                <th>Tên đăng nhập</th>
                <th>Loại quyền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <?php
            $role=DB::table('roles')->select('name')->where('id',$user->role_id)->first();
            $infouser=DB::table('user')->select('full_name','username')->where('id',$user->user_id)->first();
            ?>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $infouser->full_name }}</td>
                <td>{{ $infouser->username }}</td>
                <td>{{ $role->name }}</td>
            </tr>
            @endforeach()
        </tbody>
        <tfoot>
            <tr>
                <th>Mã</th>
                <th>Họ tên</th>
                <th>Tên đăng nhập</th>
                <th>Loại quyền</th>
            </tr>
        </tfoot>
    </table>

@stop
