$(document).ready(function () {
    var form = $("#form_delete_subject");
    $("#btn_delete_subject").click(function () {
        var subjectId = $(this).data("id");
        console.log(subjectId);
        // if (confirm("Are you sure to delete this subject?")) {
        $.ajax({
            type: "Delete",
            url: form.attr("action"),
            data: {
                _token: form.find('input[name="_token"]').val(),
                _method: "DELETE",
                id: subjectId,
            },
            success: function (data) {
                console.log("Success:", data);
                $("#tr"+subjectId).remove();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
        // }
    });
});
