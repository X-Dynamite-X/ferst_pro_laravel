// $(document).ready(function () {
//     $(".btn_update_user").click(function () {

//         // e.preventDefault();
//         var id = $(this).data("id");
//         var form = $("#form_edit_user"+id);
//         var formData = form.serialize();
//         $.ajax({
//             type: form.attr("method"),
//             url: form.attr("action"),
//             data: formData,
//             success: function (res) {
//                 console.log(res);
//                 data = res.user;
//                 console.log(data.is_actev);
//                 console.log(data.id);
//                 $("#name" + data.id).text(data.name);
//                 $("#email" + data.id).text(data.email);
//                 $("#is_actev" + data.id).prop('checked', data.is_actev);
//                 var tdElement = $("#actev" + data.id);
//                 tdElement.removeClass('text-success text-danger');
//                 tdElement.addClass(data.is_actev ? 'text-success ' : 'text-danger');
//                 tdElement.text(data.is_actev ? 'Is Actev' : 'Not Actev');
//                 $("#EditModel" + data.id).modal("hide");
//                 $(".subjects_user_id" + data.id).text(data.subject);

//             },
//             error: function (data) {
//                 console.log("Errou for send data");
//                 alert("Errou for send data");
//             },
//         });
//     });
// });
$(document).on('click', '.btn_update_user', function() {

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
                $("#EditModelLabel" + data.id ).text(data.name);
                var tdElement = $("#actev" + data.id);
                tdElement.removeClass('text-success text-danger');
                tdElement.addClass(data.is_actev ? 'text-success ' : 'text-danger');
                tdElement.text(data.is_actev ? 'Is Actev' : 'Not Actev');
                $("#ModelShowLabel" + data.id ).text(data.name);
                $("#show_user_name" + data.id).text(data.name);
                $("#show_user_email" + data.id).text(data.email);
                var show_actev = $("#show_user_is_actev" + data.id);
                show_actev.removeClass('text-success text-danger');
                show_actev.addClass(data.is_actev ? 'text-success ' : 'text-danger');
                show_actev.text(data.is_actev ? 'Is Actev' : 'Not Actev');
                $("#EditModel" + data.id).modal("hide");
                $(".subjects_user_id" + data.id).text(data.subject);
            },
            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });

