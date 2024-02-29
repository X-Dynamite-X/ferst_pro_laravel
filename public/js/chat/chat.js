Pusher.logToConsole = true;

const pusher = new Pusher('0881139f278cbc02059c', {
    cluster: 'ap2'
  });

const channel = pusher.subscribe("public");

channel.bind("chat", function (data) {
    console.log(data.name);
    console.log(username);
if (username != data.name) {
    $.post("/receive", {
        _token: csrf_token,
        message: data.message,
    }).done(function (res) {
        console.log(res);
        $(".messages > .message").last().after(res);
        $(document).scrollTop($(document).height());
    });}
});


$(document).on("click", ".send_msg", function () {
    var form = $("#chatForm");
    var formData = form.serialize();
    console.log(form);
    console.log(formData);

    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        socket_id: pusher.connection.socket_id,
        data: formData,
        success: function (response) {
            console.log('success');
        },
        error: function (response) {
        console.log(response);

            console.log("Errou for send data");
            alert("Errou for send data");
        },
    }).done(function (res) {
        // console.log(res);

        $(".messages > .message").last().after(res);
        $("#message").val("");
        $(document).scrollTop($(document).height());
    });
});
