@extends('layouts.backend-login')
@section('main')
    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    <p id="profile-name" class="profile-name-card"></p>
    <form class="form-signin" method="post">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" id="username" class="form-control" placeholder="Username" name="username" autofocus>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
        <div id="remember" class="checkbox">
            <label>
                <input type="checkbox" value="remember" value="1"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form><!-- /form -->
    <a href="#" class="forgot-password">
        Forgot the password?
    </a>
@stop()