// $(document).ready(function () {
//     $(".add_subject_user_btn").click(function () {
//         // e.preventDefault();
//         var id = $(this).data("id");
//         var form = $("#form_add_subject_user" + id);
//         var formData = form.serialize();
//         $.ajax({
//             type: form.attr("method"),
//             url: form.attr("action"),
//             data: formData,
//             success: function (data) {
//                 for (let i = 0; i < data[0].length; i++) {
//                     $("#stud" + data[1].id + data[0][i].id).remove();
//                     var tr_show_user_subject = `
//                     <tr id='row_show_user_subject${id}${data[0][i].id}'>
//                     <td>${data[0][i].id}</td>
//                     <td class="subjects_user_id${data[0][i].id}"> ${data[0][i].name}</td>
//                     <td class="subject_users_id${id}" >  ${data[1].subject}</td>
//                     <td id="subject_user_mark${id}${data[0][i].id}">  0 </td>
//                     <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModelsubjectUser${id}${data[0][i].id}">Edit</button></td>
//                     <td>
//                     <form
//                         action="/admin/user_subject/${id}/${data[0][i].id}/delete_user_mark"
//                         id="form_delete_subject_user${id}${data[0][i].id}" method="post">
//                         <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
//                         <input type="hidden" name="_method" value="delete">
//                         <button data-user_id="${data[0][i].id}"
//                             data-subject_id="${id}"
//                             data-subject="${data[1].subject}"
//                             data-user="${data[0][i].name}"
//                             type="button"
//                             class="btn btn-danger btn_delete_subject_user">Delete</button>
//                     </form>
//                 </td>
//                     </tr>`;
//                     $("#tr_show_user_subject" + id).append(
//                         tr_show_user_subject
//                     );
//                     var edit_user_subject = `
//                         <div class="modal fade" id="EditModelsubjectUser${id}${data[0][i].id}"
//                             data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
//                             aria-labelledby="EditModelsubjectUserlabel" aria-hidden="true">
//                             <div class="modal-dialog">
//                                 <div class="modal-content">
//                                     <div class="modal-header">
//                                         <h1 class="modal-title fs-5 text-light" id="EditModelsubjectUserlabel">
//                                             ${data[1].subject}
//                                         </h1>
//                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
//                                     </div>
//                                     <div class="modal-body">
//                                         <div class="container">
//                                             <form id="form_edit_subject_user${id}${data[0][i].id}"
//                                                 action="/admin/user_subject/${id}/${data[0][i].id}/update_user_mark"
//                                                 method="post">
//                                                 <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
//                                                 <input type="hidden" name="_method" value="put">
//                                                 <input type="hidden" name="subject_id" value="${id}" id="hidd_subject_id${id}">
//                                                 <input type="hidden" name="user_id" value="${data[0][i].id}" id="hidd_user_id${data[0][i].id}">
//                                                 <div class="md-5">
//                                                     <label class="form-label d-inline">Subject</label>
//                                                     <h5 class="d-inline">${data[1].subject}</h5>
//                                                 </div>
//                                                 <div class="md-5">
//                                                     <label class="form-label d-inline">Username</label>
//                                                     <h5 class="d-inline">${data[0][i].name}</h5>
//                                                 </div>
//                                                 <div class="md-5">
//                                                     <label for="Mark${data[0][i].id}" class="form-label d-inline">Mark</label>
//                                                     <input type="text" name="user_mark" maxlength="3"
//                                                         id="Mark${data[0][i].id}" class="w-auto form-control d-inline"
//                                                         placeholder="Enter Mark:" value="0">
//                                                 </div>
//                                         </div>
//                                     </div>
//                                     <div class="modal-footer">
//                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
//                                         <button type="button" data-user_id="${data[0][i].id}" data-subject_id="${id}"
//                                             class="btn btn-success btn_edit_subject_user">Save</button>
//                                     </div>
//                                     </form>
//                                 </div>
//                             </div>
//                         </div>
//                     `;

//                     $(".EditModelsubjectUser").append(edit_user_subject);
//                 }
//             },
//             error: function (data) {
//                 console.log("Errou for send data");
//                 alert("Errou for send data");
//             },
//         });
//     });
// });

$(document).on("click", ".add_subject_user_btn", function () {
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
                    <tr id='row_show_user_subject${id}${data[0][i].id}'>
                    <td>${data[0][i].id}</td>
                    <td class="subjects_user_id${data[0][i].id}"> ${data[0][i].name}</td>
                    <td class="subject_users_id${id}" >  ${data[1].subject}</td>
                    <td id="subject_user_mark${id}${data[0][i].id}">  0 </td>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModelsubjectUser${id}${data[0][i].id}">Edit</button></td>
                    <td>
                    <form
                        action="/admin/user_subject/${id}/${data[0][i].id}/delete_user_mark"
                        id="form_delete_subject_user${id}${data[0][i].id}" method="post">
                        <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                        <input type="hidden" name="_method" value="delete">
                        <button data-user_id="${data[0][i].id}"
                            data-subject_id="${id}"
                            data-subject="${data[1].subject}"
                            data-user="${data[0][i].name}"
                            type="button"
                            class="btn btn-danger btn_delete_subject_user">Delete</button>
                    </form>
                </td>
                    </tr>`;
                $("#tr_show_user_subject" + id).append(tr_show_user_subject);
                var edit_user_subject = `
                        <div class="modal fade" id="EditModelsubjectUser${id}${data[0][i].id}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="EditModelsubjectUserlabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-light" id="EditModelsubjectUserlabel">
                                            ${data[1].subject}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <form id="form_edit_subject_user${id}${data[0][i].id}"
                                                action="/admin/user_subject/${id}/${data[0][i].id}/update_user_mark"
                                                method="post">
                                                <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                                <input type="hidden" name="_method" value="put">
                                                <input type="hidden" name="subject_id" value="${id}" id="hidd_subject_id${id}">
                                                <input type="hidden" name="user_id" value="${data[0][i].id}" id="hidd_user_id${data[0][i].id}">
                                                <div class="md-5">
                                                    <label class="form-label d-inline">Subject</label>
                                                    <h5 class="d-inline">${data[1].subject}</h5>
                                                </div>
                                                <div class="md-5">
                                                    <label class="form-label d-inline">Username</label>
                                                    <h5 class="d-inline">${data[0][i].name}</h5>
                                                </div>
                                                <div class="md-5">
                                                    <label for="Mark${data[0][i].id}" class="form-label d-inline">Mark</label>
                                                    <input type="text" name="user_mark" maxlength="3"
                                                        id="Mark${data[0][i].id}" class="w-auto form-control d-inline"
                                                        placeholder="Enter Mark:" value="0">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" data-user_id="${data[0][i].id}" data-subject_id="${id}"
                                            class="btn btn-success btn_edit_subject_user">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    `;
                $(".EditModelsubjectUser").append(edit_user_subject);
            }
        },
        error: function (data) {
            console.log("Errou for send data");
            alert("Errou for send data");
        },
    });
});
