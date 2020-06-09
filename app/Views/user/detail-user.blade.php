@extends('layouts.backend')
@section('title','NHÂN VIÊN')
@section('box-body')


<div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{$user->full_name}}</h3>

              <p class="text-muted text-center">{{$user->username}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Giới thiệu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Email</strong>

              <p class="text-muted">
                {{$user->email}}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Địa chỉ</strong>

              <p class="text-muted">{{$user->address}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Phone</strong>

             <p class="text-muted">{{$user->phone}}</p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


@stop
