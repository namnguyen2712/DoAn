@extends('layouts.index')
@section('main')
<div class="site-section">
      <div class="container">
        <div class="row">

            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sản phẩm</th>
                    <th>Tổng đơn hàng</th>
                    <th>Thời gian</th>
                    <th>Nhân viên bán hàng</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($order as $o)
                <?php
    				$i_detail = DB::table('order_detail')->where('order_id',$o->id)->get();
    				$employee = DB::table('user')->where('id',$o->employee_id)->first();
    			 ?>
                <tr>
                    <td>
                    	@foreach($i_detail as $id)
        					<?php
        						$pro = DB::table('products')->where('id',$id->pro_id)->first();
        					?>
        					{{$pro->name}} - SL: {{$id->quantity}}<br>
    				    @endforeach
                    </td>
                    <td>{{number_format($o->sum)}}</td>
                    <td>{{date('d/m/Y ', strtotime($o->created_at))}}</td>
                    <td>{{$employee->full_name}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>

        </div>
    </div>
@stop
