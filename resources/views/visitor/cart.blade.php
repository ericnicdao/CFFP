@extends('layouts.app')

@section('content')
<form action='/checkout' method='get'>
<div class='container' style='padding-top: 20px'>
    <div class='row justify-content-center'>
            <div class='col-md-6'><!--style='border: 1px solid black; width: 50%; padding: 5px; float: left; text-align: center'-->
                <h1>Customer Information</h1>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type='text' name='fname' placeholder='First Name'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type='text' name='lname' placeholder='Last Name'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type='text' name='contact' placeholder='Mobile Number'><br />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type='text' name='address' placeholder='# / St / Subd / flr / bldg'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type='text' name='barangay' placeholder='Barangay'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type='text' name='zip' placeholder='Zip Code'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">                    
                        <input type='text' name='city' placeholder='Cirt / Municipality'>       
                    </div>
                </div>
            </div>
            <div class='col-md-6'><!--style='border: 1px solid black; width: 50%; padding: 5px; float: right'-->
                <h1>Your Shopping Cart</h1>
                <p>{{Cart::count()}} item(s) is in the list</p> 
                @if(Cart::count() > 0) 
                
                <table>
                    <tr style='text-align: center'>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Update</th>
                    </tr>
                    @foreach($items as $item)                     
                        <tr>  
                            <td  style='padding: 0px 5px'><a href='/cart/remove/{{$item->rowId}}'><img width='20px' height='20px' src='{{url("assets/img/del_big.png")}}'></a></td>
                            <td  style='padding: 0px 5px'>{{$item->name}}</td>           
                            <td  style='padding: 0px 5px'>
                                <input type='text' id='qty' name='qty' size='2' placeholder='qty' value='{{$item->qty}}' onChange='updateLink()'> 
                                {{$item->options->unit}}
                            </td>
                            <td  style='padding: 0px 5px'> ₱{{$item->price}} per {{$item->options->unit}}</td>
                            <td  style='padding: 0px 5px'> ₱{{$item->qty * $item->price}}</td>
                            <td  style='padding: 0px 5px'>
                                <input type='hidden' id='rowId' value='{{$item->rowId}}'>
                                <a id='link' href=''>
                                    <img width='20px' height='20px' src='{{url("assets/img/update.png")}}'>
                                </a>
                            </td>
                        </tr>
                    @endforeach  
                </table> 
                @endif
                <div>
                Total Price:{{Cart::total()}}<br />
                <center><a href='/cart/clear'>Clear</a></center>
                </div>
                Please be advised that we're only cash on delivery transaction.
            </div>
            <button type='submit'>Check Out</button>
            @csrf
    </div>
</div>
        </form>

@endsection

<script>
function updateLink() {
    let x = document.getElementById('link').getAttribute('href');
    document.getElementById('link').setAttribute('href', '/cart/update/' + document.getElementById('rowId').value + '&' + document.getElementById('qty').value);
}
</script>