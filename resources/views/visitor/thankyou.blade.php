@extends('layouts.app')

@section('content') 
<div class='container' style='padding-top: 20px;'>
    <div class='row'>
        <h3>
        <p>Thank you for choosing Cruz Fresh Farm Product for your daily needs.</p>

        <p>We hope to transact with you again in the future.</p>
        </h3>

        <h5><p>Please note your reference id {{$id}} for tracking purposes.</p></h5>
        <br />
        <h6><a href='/shop'>Continue Shopping</a></h6>
    </div>
</div>

@endsection
