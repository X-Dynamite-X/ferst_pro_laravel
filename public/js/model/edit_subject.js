// $(document).ready(function () {
//     $(".btn_update").click(function () {
//         // e.preventDefault();
//         var id = $(this).data("id");
//         var form = $("#form_edit_subject" + id);
//         var formData = form.serialize();
//         $.ajax({
//             type: form.attr("method"),
//             url: form.attr("action"),
//             data: formData,
//             success: function (data) {
//                 console.log(data);
//                 console.log("done");
//                 $("#subject" + data.id).text(data.subject);
//                 $("#full_mark" + data.id).text(data.full_mark);
//                 $(".subject_users_id" + data.id).text(data.subject);


//                 // $("#EditModelsubject"+data.id);
//                 $("#EditModelsubject" + data.id).modal("hide");
//             },
//             error: function (data) {
//                 console.log("Errou for send data");
//                 alert("Errou for send data");
//             },
//         });
//     });
// });

$(document).on('click', '.btn_update', function() {
    var id = $(this).data("id");
    var form = $("#form_edit_subject" + id);
    var formData = form.serialize();
    $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            console.log(data);
            console.log("done");
            $("#subject" + data.id).text(data.subject);
            $("#mini_mark" + data.id).text(data.mini_mark);
            $("#full_mark" + data.id).text(data.full_mark);
            $(".subject_users_id" + data.id).text(data.subject);
            
            $("#EditModelsubjectLabel" + data.id).text(data.subject);
            $("#AddModelsubjectUserLabel" + data.id).text('Add User in '+data.subject+' subject');
            $("#ModelShowsubjectLabel" + data.id).text(data.subject);
            $(".subject_users_id" + data.id).text(data.subject);


            // $("#EditModelsubject"+data.id);
            $("#EditModelsubject" + data.id).modal("hide");
        },
        error: function (data) {
            console.log("Errou for send data");
            alert("Errou for send data");
        },
    });
});
