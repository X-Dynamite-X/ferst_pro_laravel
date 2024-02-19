$(document).ready(function () {
    $(".add_subject_user_btn").click(function () {
        // e.preventDefault();
        var id = $(this).data("id");
        var form = $("#form_add_subject_user" + id);
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                for (let i = 0; i < data[0].length; i++) {

                    $("#stud" + data[1].id + data[0][i].id).remove();
                    var tr_show_user_subject = `
                    <tr id='tr_show_user_subject${id}${data[0][i].id}'>
                    <td>${data[0][i].id}</td>
                    <td>${data[0][i].name}</td>
                    <td>${data[1].subject}</td>
                    <td>0</td>
                    </tr>`;
                    $("#tr_show_user_subject" + id).append(tr_show_user_subject);
                }
            },
            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });
});
