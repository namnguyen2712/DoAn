@extends('layouts.index')

@section('main')
<form class="" action="index.html" method="post">


<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-5 text-black">Đổi mật khẩu</h2>
          </div>
          <div class="col-md-12">

            <form action="#" method="post">

              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label  class="text-black">Mật khẩu cũ <span class="text-danger">*</span></label>
                    <input type="password" class="form-control"  name="oldPassword">
                  </div>
                  <div class="col-md-6">
                    <label  class="text-black">Mật khẩu mới<span class="text-danger">*</span></label>
                    <input type="password" class="form-control"  name="newPassword">
                  </div>
                  @if($errors->has('password'))
                        <div class="help-block">
                            {!!$errors->first('password')!!}
                        </div>
                    @endif
                  <div class="col-md-6">
                    <label  class="text-black">Nhập lại mật khẩu mới<span class="text-danger">*</span></label>
                    <input type="password" class="form-control"  name="password_rp">
                  </div>
                  @if($errors->has('password_rp'))
                      <div class="help-block">
                          {!!$errors->first('password_rp')!!}
                      </div>
                  @endif
                </div>

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group row">
                  <div class="col-lg-12">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" name="button">Đổi mật khẩu</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    </form>
@stop
