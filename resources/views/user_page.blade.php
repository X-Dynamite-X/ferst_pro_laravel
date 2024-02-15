@extends('include.index')
    @section('userInfo')
        @include('admin.user_page.user_info')
    @endsection(userInfo)
    @section("model")
        @include('admin.model.show_user')
        @include('admin.model.edit_user')
        @include('admin.model.create_user')
    @endsection("model")
    @section("model_js")
        <script src="{{ asset('js/model/edit_user.js') }}"></script>
        <script src="{{ asset('js/model/create_user.js') }}"></script>
        <script src="{{ asset('js/model/delete_user.js') }}"></script>
    @endsection
