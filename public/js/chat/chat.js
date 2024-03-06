Pusher.logToConsole = true;

const pusher = new Pusher("0881139f278cbc02059c", {
    cluster: "ap2",
});
// var username = document.getElementById('subject_id').value;
var subjectId = document.getElementById("subject_id").value;

const encodedSubjectId = encodeURIComponent(subjectId);
const channel = pusher.subscribe(`chat${encodedSubjectId}`);

var isSending = false;

function sendMessage() {
    if (isSending) {
        return;
    }

    var form = $("#chatForm");
    var formData = form.serialize();
    isSending = true;
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        socket_id: pusher.connection.socket_id,
        data: formData,
        success: function (response) {
            console.log("success");
        },
        error: function (response) {
            console.log(response);
            console.log("Error sending data");
            alert("Error sending data");
        },
        complete: function () {
            isSending = false;
        },
    }).done(function (res) {
        $(".messages > .message").last().after(res);
        $("#message").val("");
        $(document).scrollTop($(document).height());
    });
}

function handleKeyPress(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}


$(document).on("click", ".send_msg", function () {
    sendMessage();
});
channel.bind("chat", function (data) {
    console.log(data);
    if (username != data.user_id) {
        console.log(data.user_id);
        $.ajax({
            url: `/receive/${encodedSubjectId}`,
            method: 'POST',
            data: {
                _token: csrf_token,
                message: data.message,
                user: data.user_id,
            },
            success: function (res) {
                $(".messages > .message").last().after(res);
                $(document).scrollTop($(document).height());
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }
});
