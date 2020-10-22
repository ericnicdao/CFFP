@extends('layouts.app')

@section('content')
<div class='container-grid' style='padding-top: 20px;'>
    <ul>
        @foreach($products as $product)
        <li>
            <div class='image'>
                <img width='200px' height='200px' src='{{asset("storage/$product->imgPath")}}'>
            </div>
            <div class='title'>
                <h4><strong>{{$product->name}}</strong></h4>
                <strong>{{$product->stock}}&nbsp;{{$product->unit}}(s) | ₱{{$product->price}}</strong>
            </div>
            <!--<div class='body'>
                
            </div>-->
            <div class='controls'>
                <form action='/cart/store' method='post'>
                    <input type='hidden' name='id' value='{{$product->id}}'>
                    <input type='hidden' name='name' value='{{$product->name}}'>
                    <input type='hidden' name='price' value='{{$product->price}}'>
                    <input type='hidden' name='unit' value='{{$product->unit}}'>
                    <input type='hidden' name='stock' value='{{$product->stock}}'>
                    <!--<input type='text' size='2' name='qty'>{{$product->unit}}(s)-->
                    <button type='submit' class='btn btn-secondary'>
                        Add to Cart
                        <!--<img src='{{url("assets/img/addtocart.png")}}' width='40px' height='40px'>-->
                    </button>
                    @csrf
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection
