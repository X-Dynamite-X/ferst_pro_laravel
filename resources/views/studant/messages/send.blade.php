<!-- ملف resources/views/messages/send.blade.php -->


    <div>
        <h2>إرسال رسالة</h2>
        <form action="{{ route('messages.send', ['senderUserId' => Auth::user()->id, 'receiverUserId' => $receiverUserId]) }}" method="post">
            @csrf
            {{-- <div>
                <label for="sender_user_id">معرف المرسل:</label>
                <input type="text" name="sender_user_id" value="{{ Auth::user()->id }}" readonly>
            </div>
            <div>
                <label for="receiver_user_id">معرف المستقبل:</label>
                <input type="text" name="receiver_user_id" placeholder="معرف المستقبل">
            </div> --}}
            <div>
                <label for="message_body">نص الرسالة:</label>
                <textarea name="message_body" placeholder="أكتب رسالتك هنا"></textarea>
            </div>
            <button type="submit">إرسال الرسالة</button>
        </form>
    </div>
