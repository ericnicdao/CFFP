

@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->\
<div class="content-wrapper" onLoad='check'>
    <div style='padding: 0px 20px'>        
        <h1>
            Orders {{ asset('plugins/summernote/summernote-bs4.min.css') }}
        </h1>
        <table id='datatable'>
            <thead>
                <tr style='text-align: center; background-color: #4f4f4d; color: #FFF'>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Barangay</th>
                    <th>Municipality</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td style='padding: 5px 10px; border-bottom: solid black'>
                            <a href='/orders/details/{{$customer->code}}&{{$customer->fname}} {{$customer->lname}}&{{$customer->address}} {{$customer->barangay}} {{$customer->city}}&{{$customer->status}}'>
                                {{$customer->code}}
                            </a>
                        </td>
                        <td style='padding: 5px 10px; border-bottom: solid black'>{{$customer->fname}} {{$customer->lname}}</td>
                        <td style='padding: 5px 10px; border-bottom: solid black'>{{$customer->barangay}}</td>
                        <td style='padding: 5px 10px; border-bottom: solid black'>{{$customer->city}}</td>
                        <td style='padding: 5px 10px; border-bottom: solid black'>{{$customer->status}}</td>
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