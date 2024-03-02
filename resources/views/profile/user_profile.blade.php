@extends('include.index')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile/user_profile.css') }}">
@endsection("css")
@section('content')
<section>
    <div class="user_profile ">
        <div class="content">
            <div class="user_full_name">
                <div class="img_user_name">
                    <div class="background_img_user">
                        <img src="{{ asset('user_profile/image/' . $user->image) }}" alt="" class="background_img">
                        <div class="imag_user">
                        </div>
                    </div>
                    <div class="user_inf_name">
                        <div class="user_name">
                            <label for="">User name: </label>
                            <h2> {{$user->name}}</h2>
                        </div>
                        <div class="email_user">
                            <label for="">Email: </label>
                            <h2>
                                {{$user->email}}
                            </h2>
                        </div><li-icon></li-icon>
                        <div class="inputBox">
                            <a href="{{ route('edit_profile', ['id'=>$user->id]) }}">
                            <input type="button" value="edit profile"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection("content")
