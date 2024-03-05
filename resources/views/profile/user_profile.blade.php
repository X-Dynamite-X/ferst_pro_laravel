@extends('include.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile/user_profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/edit_profile.css') }}">
@endsection("css")
@section('content')
    <section>
        <div class="user_profile " data-bs-theme="dark">
            <div class="content">
                <div class="user_full_name">
                    <div class="img_user_name">
                        <div class="background_img_user">
                            <img id="user_image" src="{{ asset('user_profile/image/' . $user->image) }}" alt=""
                                class="background_img">
                            <div class="imag_user">
                            </div>
                        </div>
                        <div class="user_inf_name">
                            <div class="user_name">
                                <label for="">User name: </label>
                                <h2 id="username_profilr"> {{ $user->name }}</h2>
                            </div>
                            <div class="email_user">
                                <label for="">Email: </label>
                                <h2 id="email_profilr">
                                    {{ $user->email }}
                                </h2>
                            </div><li-icon></li-icon>
                            <div class="inputBox">
                                {{-- <a href="{{ route('edit_profile', ['id'=>$user->id]) }}">
                            <input type="button" value="edit profile"></a> --}}
                                <input type="button" value="edit profile" data-bs-toggle="modal"
                                    data-bs-target="#edit_profile_model">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @include('profile.model.edit_profile')
@endsection("content")
@section('model_js')
    <script src="{{ asset('js/model/edit_profile.js') }}"></script>
@endsection
