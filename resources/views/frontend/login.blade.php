@extends('layouts.index')
@section('main')

<div class="container">
    <div class="row">
        <form action="" method="POST" accept-charset="utf-8">


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-login">
                Đăng nhập Cộng cà phê
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <img src="{{url('/')}}/public/img/logo_636026696578599547.png" alt="">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <input type="text" id="username" class="form-control" placeholder="Username" name="username" autofocus>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label>
                    <input type="checkbox" value="remember" value="1"> Remember me
                </label>
            </div>

        </div>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</div>
</div>
@stop()