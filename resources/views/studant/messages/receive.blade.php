<div class="left message">
    <p>{{ $user->name }}</p>
</div>
 <div class="left message">
    <img src={{ asset('user_profile/image/' .$user->image )}} alt="" srcset="">
    <p>{{ $message_body }}</p>
</div>

