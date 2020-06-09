@extends('layouts.backend')
@section('box-title')
<div class="container">
    <a href="{{route('backend.customer')}}" title=""><span class="glyphicon glyphicon-menu-left"></span>Trở về</a>
</div>
@stop
@section('box-body')

<form action="" method="POST" role="form">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>Tên khách hàng <span style="color: red;">*</span></td>
                <td>
                    <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Nhập tên khách hàng"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @if($errors->has('name'))
                    <div class="help-block">
                        {!!$errors->first('name')!!}
                    </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Email <span style="color: red;">*</span></td>
                <td>
                    <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Nhập email"/>
                </td>
                <td>Số điện thoại <span style="color: red;">*</span></td>
                <td>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone')}}" placeholder="Nhập số điện thoại"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @if($errors->has('email'))
                    <div class="help-block">
                        {!!$errors->first('email')!!}
                    </div>
                    @endif
                </td>
                <td></td>
                <td>
                    @if($errors->has('phone'))
                    <div class="help-block">
                        {!!$errors->first('phone')!!}
                    </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Địa chỉ <span style="color: red;">*</span></td>
                <td>
                    <input type="text" class="form-control" name="address" value="{{ old('address')}}" placeholder="Nhập địa chỉ"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @if($errors->has('address'))
                    <div class="help-block">
                        {!!$errors->first('address')!!}
                    </div>
                    @endif
                </td>
            </tr>


            <tr>
                <td>Giới tính <span style="color: red;">*</span></td>
                <td>
                    <select class="form-control" name="sex">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Chưa xác đinh">Chưa xác đinh</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @if($errors->has('sex'))
                    <div class="help-block">
                        {!!$errors->first('sex')!!}
                    </div>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>


    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <!-- <button type="submit" class="btn btn-primary">Thêm mới</button> -->
    <button type="submit" class="btn btn-app" ><i class="fa fa-save"></i> Thêm mới</button>

    @stop()
