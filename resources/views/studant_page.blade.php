@extends('include.index')
@section("content")
<link rel="stylesheet" href="{{ asset('css/chat/mycode.css') }}">

@endsection(css)
@section('userInfo')
    @include('studant.subject')
@endsection(userInfo)
