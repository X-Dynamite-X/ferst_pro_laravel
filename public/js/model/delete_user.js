$(document).ready(function () {
    $(".btn_delete_user").click(function () {
        var id = $(this).data("id");
        var form = $("#form_delete_user" + id);
        var name  =$(this).data('name')
        if (confirm("Are you sure to delete this user "+name +" ?")) {
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
