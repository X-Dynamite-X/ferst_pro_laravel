$(document).ready(function () {
    $(".btn_update_user").click(function () {
        // e.preventDefault();
        var id = $(this).data("id");
        var form = $("#form_edit_user"+id);
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (res) {
                console.log(res);
                data = res.user;
                console.log(data.is_actev);
                console.log(data.id);
                $("#name" + data.id).text(data.name);
                $("#email" + data.id).text(data.email);
                $("#is_actev" + data.id).prop('checked', data.is_actev);
                var tdElement = $("#actev" + data.id);
                tdElement.removeClass('text-success text-danger');
                tdElement.addClass(data.is_actev ? 'text-success i' : 'text-danger');
                tdElement.text(data.is_actev ? 'Is Actev' : 'Not Actev');
                $("#EditModel" + data.id).modal("hide");
            },
            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });
});
