// $(document).ready(function () {
//     $(".btn_delete_subject_user").click(function () {
//         var subject_id = $(this).data("subject_id");
//         var user_id = $(this).data("user_id");
//         var form = $("#form_delete_subject_user" + subject_id+user_id);
//         var subject =$(this).data('subject')
//         var user =$(this).data('user')

//         if (confirm("Are you sure you want to remove the user '" + user + "' from the subject '" + subject + "' ?")) {
//             $.ajax({
//                 type:form.attr("method"),
//                 url: form.attr("action"),
//                 data: form.serialize(),
//                 success: function (data) {
//                     console.log("Success:", data);
//                     $("#row_show_user_subject" + subject_id+user_id).remove();

//                 },
//                 error: function (data) {
//                     console.log("Error:", data);
//                 },
//             });
//         }
//     });
// });
$(document).on('click', '.btn_delete_subject_user', function() {
    var subject_id = $(this).data("subject_id");
        var user_id = $(this).data("user_id");
        var form = $("#form_delete_subject_user" + subject_id+user_id);
        var subject =$(this).data('subject')
        var user =$(this).data('user')

        if (confirm("Are you sure you want to remove the user '" + user + "' from the subject '" + subject + "' ?")) {
            $.ajax({
                type:form.attr("method"),
                url: form.attr("action"),
                data: form.serialize(),
                success: function (data) {
                    console.log("Success:", data);
                    $("#row_show_user_subject" + subject_id+user_id).remove();
                    var stud =`<option id="stud${subject_id}${user_id}" name="name" value="${user_id}">${user} </option>`
                    $("#user_ids"+subject_id).append(stud);

                },
                error: function (data) {
                    console.log("Error:", user_id);
                },
            });
        }
});
