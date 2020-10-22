@extends('layouts.master')

@include('admin.partials.nav')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" onLoad='check'>
    <div style='padding: 0px 20px'>        
        <h1>
            Orders > Details
        </h1>
        <strong>{{$name}}({{$code}})</strong><br />
        {{$address}}<br />
        <label class='text-danger'>{{$status}}</label><br />
        <hr />
        <table>
            <tr style='text-align: center; background-color: #4f4f4d; color: #FFF'>
                <th>Product</th>
                <th>Order</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td style='padding: 5px 10px; border-bottom: solid black'>{{$order->name}}</td>
                    <td style='padding: 5px 10px; border-bottom: solid black'>{{$order->qty}} {{$order->unit}}(s)</td>
                    <td style='padding: 5px 10px; border-bottom: solid black'>₱{{$order->price}} per {{$order->unit}}(s)</td>
                    <td style='padding: 5px 10px; border-bottom: solid black'>₱{{number_format($order->qty*$order->price, 2)}}</td>
                </tr>
            @endforeach
        </table>
        @if($status!="Delivered")
            @if($status=="Pending")
                <a href='/orders/details/process/{{$code}}&{{$name}}&{{$address}}&{{$status}}'>For Delivery</a>
            @elseif($status=="For Delivery")
                <a href='/orders/details/process/{{$code}}&{{$name}}&{{$address}}&{{$status}}'>Delivering</a>
            @else($status=="Delivering")
                <a href='/orders/details/process/{{$code}}&{{$name}}&{{$address}}&{{$status}}'>Delivered</a>
            @endif
            <a href='/orders/details/cancel/{{$code}}&'>Cancel</a>
        @endif
        
    </div>
</div>
  <!-- /.content-wrapper -->
@endsection

<!--Container
row justify-content-center
col-md-8
card
card-header
-->