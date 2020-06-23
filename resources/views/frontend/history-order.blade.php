@extends('layouts.index')
@section('main')
<div class="site-section">
      <div class="container">
        <div class="row">

            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Số hóa đơn</th>
                    <th>Thời gian</th>
                    <th>Sản phẩm</th>
                    <th>Tổng đơn hàng</th>
                    <th>Nhân viên bán hàng</th>
                    <th>Chi tiết</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($order as $o)
                <?php
    				$i_detail = DB::table('order_detail')->where('order_id',$o->id)->get();
    				$employee = DB::table('user')->where('id',$o->employee_id)->first();
    			 ?>
                <tr>
                    <td>{{$o->id}}</td>
                    <td>{{date('d/m/Y ', strtotime($o->created_at))}}</td>
                    <td>
                    	@foreach($i_detail as $id)
        					<?php
        						$pro = DB::table('products')->where('id',$id->pro_id)->first();
        					?>

                            <a href="{{route('detail',['id'=>$pro->id])}}" class="text-black">{{$pro->name}}- SL: {{$id->quantity}}<br></a>

    				    @endforeach
                    </td>
                    <td>{{number_format($o->sum)}} VNĐ</td>
                    <td>{{$employee->full_name}}</td>
                    <td><a href="{{route('order-detail',['id'=>$o->id])}}" class="btn btn-primary height-auto btn-sm"> Chi tiết </a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>

        </div>
    </div>
@stop
