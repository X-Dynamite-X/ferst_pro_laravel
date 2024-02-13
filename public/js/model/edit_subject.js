$(document).ready(function () {
    var form = $("#form_edit_subject");
    $("#btn_update").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                console.log(data);
                console.log("done");
                $("#subject"+data.id).text(data.subject);
                $("#full_mark"+data.id).text(data.full_mark);
                // $("#EditModelsubject"+data.id);
                $("#EditModelsubject" + data.id).modal("hide");
            },
            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });
});
