@extends('visitor.orderTracker')

@section('tracker') 
<div class='container' style='padding-top: 20px;'>
    <div>
        <div class='justify-content-center'>
            <h3>{{$code}}</h3>
            <table>
                @foreach($tracker as $status)
                    <tr>
                        <td>{{$status->status}}</td>
                        <td>
                            {{$status->updated_at}}<br />
                            {{$status->description}}
                        </td>
                    </tr>
                @endforeach
            </table>
            <a href='#'>Cancel</a>
        </div>
    </div>
</div>

@endsection
