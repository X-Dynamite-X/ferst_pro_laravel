// $(document).on('click', '.send_edit_profile', function() {
//     var id = $(this).data("id");
//     var form = $("#update_profile" + id);
//     var formData = form.serialize();
//     // var formData = new FormData(form[0]);
//     console.log(id);
//     console.log(form[0]);
//     console.log(form.file);

//     $.ajax({
//         type: 'POST',
//         url: form.attr("action"),
//         data: formData,
//         // contentType: false,
//         processData: false,
//         success: function (data) {
//             console.log(data);
//             $("#username_profilr" ).text(data.name);
//             $("#email_profilr" ).text(data.email);
//             $('#background_preview_image').attr('src', "/user_profile/image/"+data.image);
//             $('#user_image').attr('src', "/user_profile/image/"+data.image);

//             console.log("done");
//         },
//         error: function (data) {
//             console.log("Errou for send data");
//             alert("Errou for send data");
//         },
//     });
// });
$(document).on('click', '.send_edit_profile', function() {
    var id = $(this).data("id");
    var form = $("#update_profile" + id);
    var formData = new FormData(form[0]);

    $.ajax({
        type: 'POST',
        url: form.attr("action"),
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
            $("#username_profilr").text(data.name);
            $("#email_profilr").text(data.email);
            $('#background_preview_image').attr('src', "/user_profile/image/" + data.image);
            $('#user_image').attr('src', "/user_profile/image/" + data.image);
            $('#avater_image').attr('src', "/user_profile/image/" + data.image);

            $("#edit_profile_model").modal("hide");



            console.log("done");
        },
        error: function(data) {
            console.log("Error while sending data");
            alert("Error while sending data");
        },
    });
});
function previewImage(input) {
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#background_preview_image').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }

}
