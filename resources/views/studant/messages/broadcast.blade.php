<div class="right message">

    <p>{{ $user->name }}</p>
</div>
<div class="right message">
    <p>{{ $message_body->message_body }}</p>
    <img src="{{ asset('user_profile/image/' . $user->image) }}" alt="" srcset="">


</div>

