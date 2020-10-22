@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div style='padding: 0px 20px'>
        <h1>Products > Add</h1>
        <div>            
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action='/create/add' method='post' enctype="multipart/form-data">
                <input type='file' name='image'><br />
                <input type='text' name='name' placeholder='name'></input><br />
                <textarea placeholder='description' name='desc' maxlength="255" rows="5" cols="51"></textarea><br />
                <input type='text' name='price' placeholder='price'></input> / kg(s)<br />
                <button type='submit'>Add Product</button>
                @csrf
            </form>
        </div>        
    </div>
</div>
@endsection