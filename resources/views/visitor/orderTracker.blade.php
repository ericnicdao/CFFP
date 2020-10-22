@extends('layouts.app')

@section('content') 
<div class='container' style='padding-top: 20px;'>
    <div>
        <form action='/track/view' method='get'>
            <input type='text' placeholder='Please put your given code' name='txtCode' class='form-control'>
            <div class='row justify-content-center'>
                <button type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>
        <main>
            @yield('tracker')
        </main>
    </div>
</div>

@endsection
