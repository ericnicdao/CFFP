@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div style='padding: 0px 20px'>
        <form action='/delete' method='post'>
            <h1>
                Products > List
                <button type='submit'><img width='35px' height='35px' src='{{url("assets/img/del_big.png")}}' onClick='return confirm("Are you sure?")'></button>
                @csrf
            </h1>
            <table id='datatable'>
                <thead>
                    <tr style='background-color: #4f4f4d; color: #FFF'>
                        <th style='text-align: center; width: 5px'><input type='checkbox'></th>
                        <th style='text-align: center; width: 40px'>Image</th>
                        <th style='text-align: center; width: 100px'>Item</th>
                        <th style='text-align: center; width: 100px'>Price</th>
                        <th style='text-align: center'>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td style='padding: 5px 10px; border-bottom: solid black; text-align: center; width: 5px'>
                            <input type='checkbox' value='{{$product->id}}' name='delChk[]' />
                        </td>
                        <td style='padding: 5px 10px; border-bottom: solid black; width: 40px'>
                            <img width='40px' height='40px' src='{{asset("storage/$product->imgPath")}}'>
                        </td>
                        <td style='padding: 5px 10px; border-bottom: solid black; width: 100px'>
                            <a href='/list/{{$product->id}}'>{{$product->name}}</a> 
                        </td>
                        <td style='padding: 5px 10px; border-bottom: solid black; width: 100px'>₱{{$product->price}} / kg(s)</td>
                        <td style='padding: 5px 10px; border-bottom: solid black'>{{$product->desc}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
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

