Pusher.logToConsole = true;

const pusher = new Pusher("0881139f278cbc02059c", {
    cluster: "ap2",
});
// var username = document.getElementById('subject_id').value;
const encodedsenderUser = encodeURIComponent(senderUser);

const encodedreceiverUserId = encodeURIComponent(receiverUserId);
const channel = pusher.subscribe(`from`+encodedreceiverUserId+`to` +encodedsenderUser);

var isSending = false;


function sendMessage() {
    if (isSending) {
        return;
    }
    var form = $("#chatUserForm");
    var formData = form.serialize();
    isSending = true;
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        socket_id: pusher.connection.socket_id,
        data: formData,
        success: function (response) {
            console.log("success");
            console.log(response);
            console.log("send");
            $(".messages > .message").last().after(response);
            $("#message_user").val("");
            $(document).scrollTop($(document).height());
        },
        error: function (response) {
            console.log(response);
            console.log("Error sending data");
            alert("Error sending data");
        },
        complete: function () {
            isSending = false;
        },
    })

}

function handleKeyPress(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}

$(document).on("click", ".send_user_msg", function () {
    sendMessage();
});

console.log(senderUser == encodedreceiverUserId);
channel.bind("chatuser", function (data) {
    console.log(data);
    console.log('res');

    // if (senderUser == data.encodedreceiverUserId) {
        console.log(data);
        console.log('res');
        $.ajax({
            url: receive,
            method: 'POST',
            data: {
                _token: csrf_token,
                message_body: data.message_body,
                encodedreceiverUserId: data.encodedreceiverUserId,
            },
            success: function (res) {
                $(".messages > .message").last().after(res);
                $(document).scrollTop($(document).height());
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    // }
});
