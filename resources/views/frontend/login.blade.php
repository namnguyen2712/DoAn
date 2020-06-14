@extends('layouts.index')
@section('main')

<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-5 text-black">Đăng nhập hệ thống</h2>
          </div>
          <div class="col-md-12">

            <form action="#" method="post">

              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label  class="text-black">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="phone">
                  </div>
                  <div class="col-md-6">
                    <label  class="text-black">Mật khẩu<span class="text-danger">*</span></label>
                    <input type="password" class="form-control"  name="password">
                  </div>
                </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group row">
                  <div class="col-lg-12">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" name="button">Đăng nhập</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
@stop()
