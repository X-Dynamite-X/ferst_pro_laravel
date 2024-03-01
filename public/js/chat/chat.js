Pusher.logToConsole = true;

const pusher = new Pusher("0881139f278cbc02059c", {
    cluster: "ap2",
});
const encodedSubjectId = encodeURIComponent(subjectId);
const channel = pusher.subscribe(`chat${encodedSubjectId}`);
channel.bind("chat", function (data) {
    if (username != data.user) {
        $.post("/receive/${encodedSubjectId}", {
            _token: csrf_token,
            message: data.message,
            user: data.user,
        }).done(function (res) {
            $(".messages > .message").last().after(res);
            $(document).scrollTop($(document).height());
        });
    }
});
$(document).on("click", ".send_msg", function () {
    var form = $("#chatForm");
    var formData = form.serialize();
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
            console.log("Errou for send data");
            alert("Errou for send data");
        },
    }).done(function (res) {
        $(".messages > .message").last().after(res);
        $("#message").val("");
        $(document).scrollTop($(document).height());
    });
});
