@extends('pages.template')
@section('content')
<form action="{{ route('postTrackOrder') }}" method="GET">
    enter tracking number provided in Email. <br>
    <input type="text" name="number"><br>
    <input type="submit"><br>
</form>
@stop