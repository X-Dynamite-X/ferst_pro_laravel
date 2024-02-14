$(document).ready(function () {
    $(".btn_delete_subject").click(function () {
        var id = $(this).data("id");
        var form = $("#form_delete_subject" + id);
        console.log(id);
        if (confirm("Are you sure to delete this subject?")) {
            $.ajax({
                type: "Delete",
                url: form.attr("action"),
                data: {
                    _token: form.find('input[name="_token"]').val(),
                    _method: "DELETE",
                    id: id,
                },
                success: function (data) {
                    console.log("Success:", data);
                    $("#tr" + id).remove();
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        }
    });
});
