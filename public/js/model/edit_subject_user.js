// $(document).ready(function () {
//     $(".btn_edit_subject_user").click(function () {
//         var subject_id = $(this).data("subject_id");
//         var user_id = $(this).data("user_id");
//         console.log(subject_id);
//         console.log(user_id);
//         var form = $("#form_edit_subject_user"+subject_id+user_id);
//         var formData = form.serialize();
//         $.ajax({
//             type: form.attr("method"),
//             url: form.attr("action"),
//             data: formData,
//             success: function (data) {
//                 console.log(data.user_mark);
//                 console.log("done");
//                 $("#subject_user_mark" + subject_id+user_id).text(data.user_mark);
//                 $("#EditModelsubjectUser"+subject_id+user_id).modal("hide");
//                 $("#ModelShowsubject"+subject_id).modal("show");
//             },
//             error: function (data) {
//                 console.log("Errou for send data");
//                 alert("Errou for send data");
//             },
//         });
//     });
// });



$(document).on('click', '.btn_edit_subject_user', function() {

        var subject_id = $(this).data("subject_id");
        var user_id = $(this).data("user_id");
        console.log(subject_id);
        console.log(user_id);
        var form = $("#form_edit_subject_user"+subject_id+user_id);
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                console.log(data.user_mark);
                console.log("done");
                $("#subject_user_mark" + subject_id+user_id).text(data.user_mark);
                $("#EditModelsubjectUser"+subject_id+user_id).modal("hide");
                $("#ModelShowsubject"+subject_id).modal("show");

            },
            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });
