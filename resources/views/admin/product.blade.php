@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div style='padding: 0px 20px'>
        <h1>Products > Edit Details</h1>          
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <form action='/list/edit/{{$product->id}}' method='post'>
                <!--<center><img width='150px' height='150px' src='{{asset("storage/$product->imgPath")}}'></center><br /><br />
                <input type='file' name='image'><br />-->
                <input placeholder='product' name='name' type='text' size='48' value='{{$product->name}}'><br />
                <textarea placeholder='description' name='desc' maxlength="255" rows="5" cols="51">{{$product->desc}}</textarea><br />
                <input placeholder='price' name='price' type='text' size='42' value='{{$product->price}}'> / kg(s)<br />
                
                <button type='submit'>Update</button>
                @csrf
            </form>
        </div>        
    </div>
</div>
@endsection