@extends('include.index')
@section("content")
<link rel="stylesheet" href="{{ asset('css/chat/mycode.css') }}">

@endsection(css)
    @section('userInfo')
        @include('admin.user_page.user_info_subject')
    @endsection('userInfo')

    @section("model")
        @include('admin.model.show_subject')
        @include('admin.model.edit_subject')
        @include('admin.model.create_subject')
        @include('admin.model.edit_subject_user')
        @include('admin.model.add_subject_user')
    @endsection("model")
    @section("model_js")

    <script src="{{ asset('js/model/create_subject.js') }}"></script>
    <script src="{{ asset('js/model/delet_subject.js') }}"></script>
    <script src="{{ asset('js/model/edit_subject.js') }}"></script>
    <script src="{{ asset('js/model/add_subject_user.js') }}"></script>
    <script src="{{ asset('js/model/edit_subject_user.js') }}"></script>
    <script src="{{ asset('js/model/delete_subject_user.js') }}"></script>


    @endsection("model_js")
