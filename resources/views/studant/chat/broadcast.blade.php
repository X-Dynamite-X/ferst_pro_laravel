<div class="right message">

    <p>{{ $user->name }}</p>
</div>
<div class="right message">
    <p>{{ $message->message }}</p>
    <img src="{{ asset('user_profile/image/' . $user->image) }}" alt="" srcset="">


</div>
