@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div style='padding: 0px 20px'>
        <h1>
            Inventory 
        </h1>          
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table id='datatable'>
            <thead>
                <tr style='background-color: #4f4f4d; color: #FFF'>
                    <th style='text-align: center; width: 40px'>Image</th>
                    <th style='text-align: center; width: 100px'>Item</th>
                    <th style='text-align: center; width: 100px'>Price</th>
                    <th style='text-align: center; '>Stock</th>
                    <th style='text-align: center; '>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
    				<form action="/inventory/update/{{$product->id}}" method='post'>
	                    <td style='padding: 5px 10px; border-bottom: solid black; width: 40px; text-align: center'>
	                        <img width='40px' height='40px' src='{{asset("storage/$product->imgPath")}}'>
	                    </td>
	                    <td style='padding: 5px 10px; border-bottom: solid black; width: 100px'>
	                        {{$product->name}}
	                    </td>
	                    <td style='padding: 5px 10px; border-bottom: solid black; width: 100px'>₱{{$product->price}} / kg(s)</td>
	                    <td style='padding: 5px 10px; border-bottom: solid black; width: 100px; text-align: center'>
	                        <input type='text' name='text{{$product->id}}' value='{{$product->stock}}'> kg(s)
	                    <td style='padding: 5px 10px; border-bottom: solid black; width: 100px; text-align: center'>
	                    	@csrf
	                        <button type='submit' onClick='return confirm("Please confirm update?")'>Update</button>
	                    </td>
    				</form>
                </tr>
                @endforeach
            </tbody>
        </table>
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

