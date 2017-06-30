@extends('layouts.admin')

@section('content')
<div>Uploader</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (count($catches) > 0)
<h1>Catches!!!!!!!</h1>

    @php
    $num = count($catches);
    $i = 1;
    @endphp
<p>There are {{$num}} issues with your upload.</p>

    <table>
    @foreach ($catches as $key => $catch)
        <tr>
        <td>{{$i++}}</td>
        <td>
        @foreach($catch as $cat)
            {{$cat}}<br>
        @endforeach
        </td>
        </tr>
    @endforeach
    </table>
@endif

@if (count($dud) > 0)
<h1>Duds!!!!!!!</h1>
     @php
    $nums = count($dud);
    $i = 1;
    @endphp
<p>There are {{$nums}} Duds in your upload.</p>
    <table>
    @foreach ($dud as $duds)
        <tr>
        <td>{{$i++}}</td>
        <td>
        @foreach($duds as $dud)
            {{$dud}}<br>
        @endforeach
        </td>
        </tr>
    @endforeach
    </table>
        
@endif
@endsection