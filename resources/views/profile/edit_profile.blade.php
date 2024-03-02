
@extends('include.index')
@section('css')
<link rel="stylesheet" href="{{ asset('css/profile/edit_profile.css') }}">
@endsection("css")
@section('content')
<section>

<div class="edit_profile">
    <div class="content">
        <div class="form">

            <center>
                <h2> Edit profile</h2>
            </center>
            <form method="post" enctype="multipart/form-data" action="{{ route('update_profile', ['id'=>$user->id]) }}" enctype="multepart/form-data">
                @csrf
                <div class="profileimg_and_backgrundimg">
                    <label for="background_input_img">
                        <div class="background_img_user">
                            <img id="background_preview_image" src='{{ asset('user_profile/image/' . $user->image) }}' alt=""
                                class="background_img">
                            <input type="file" id="background_input_img" name="image">
                        </div>
                    </label>
                    {{-- <label for="profile_img_input">
                        <div class="imag_user">
                            <img id="profile_preview_image" src="" alt="" class="img_fluid">
                            <input type="file" name="profile_picture" id="profile_img_input">
                        </div>
                    </label> --}}
                </div>

                <div class="inputBox">
                    <input type="text" name="e_name" required="required" value="{{$user->name}}" />
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="email" name="e_email" required="required" value="{{$user->email}}" />
                    <span>Email</span>
                    <i></i>
                </div>


                <div class="inputBox">
                    <input type="submit" value="save">
                </div>
            </form>
        </div>
    </div>
</div>
</section>

@endsection('content')
