$(document).ready(function () {
    var form = $("#form_subject");
    $("#create_subject").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (res) {
                data = res[1];
                var admin = res[2].id;

                var editModel = `<div class="modal fade" data-bs-theme="dark" id="EditModelsubject${data.id}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModelsubjectLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-light" id="EditModelsubjectLabel">${data.subject}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form id="form_edit_subject${data.id}" action="${url_updata}/${data.id}" method="post">
                                    <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                    <input type="hidden" name="_method" value="put">
                                    <div class="form">
                                        <div class="md-5">
                                            <label for="subject" class="form-label text-light">Subject</label>
                                            <input type="text" name="editsubject" id="editsubject" class="form-control" placeholder="Enter subject:" value="${data.subject}">
                                        </div>
                                        <div class="md-5">
                                            <label for="edit_mini_mark" class="form-label text-light">Mini Mark</label>
                                            <input type="text" name="edit_mini_mark" id="edit_mini_mark" class="form-control"value="${data.mini_mark}"   maxlength="3"
                                                placeholder="Enter Mini Mark:">
                                        </div>
                                        <div class="md-5">
                                            <label for="edit_full_mark" class="form-label text-light">Mark</label>
                                            <input type="number" name="edit_full_mark" id="edit_full_mark" class="form-control" placeholder="Enter Mark:" value="${data.full_mark}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success btn_update" data-id="${data.id}" id="btn_update">Update</button>
                        </div>
                        </form>
                    </di
                </div>
            </div>`;
                $("#editModel").append(editModel);
                var tr = `
                <tr id="tr${data.id}">
                    <td scope="row">${data.id}</td>
                    <td scope="row" id="subject${data.id}">${data.subject}</td>
                    <td scope="row" id="mini_mark${data.id}">${data.mini_mark}</td>
                    <td scope="row" id="full_mark${data.id}">${data.full_mark}</td>
                    <td scope="row">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddModelsubjectUser${data.id}" id="addSubjectUser${data.id}">Add Student</button>
                    </td>
                    <td scope="row">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModelShowsubject${data.id}" id="showSubjectUser${data.id}">Show</button>
                    </td>
                    <td scope="row">
                            <button class="btn btn-primary">
                               <a href="/chat/${data.id}" class="link-light message_link">
                           message</a>
                       </button>
                       </td>
                    <td scope="row">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModelsubject${data.id}" id="editSubjectUser${data.id}">Edit</button>
                    </td>
                    <td scope="row">
                        <form id="form_delete_subject${data.id}" calss="form_delete_subject"
                        action="${url_delete}/${data.id}" method="post">
                            <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                            <input type="hidden" name="_method" value="delete">
                            <button data-id="${data.id}" data-subject="${data.subject}" type="button" id="btn_delete_subject"
                                    class="btn btn-danger btn_delete_subject">Delete</button>
                        </form>
                    </td>
                </tr>
            `;
                $("#res").append(tr);

                var add_subject_user_model = `
                <div class="modal fade" id="AddModelsubjectUser${
                    data.id
                }" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddModelsubjectUserLabel${
                        data.id
                    }" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="AddModelsubjectUserLabel${
                                    data.id
                                }">Add User in
                                    ${data.subject} subject</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body h">
                                <div class="container">
                                    <form id="form_add_subject_user${data.id}"
                                        action="/admin/user_subject/${
                                            data.id
                                        }/add_user_for_subject"
                                        method="post">
                                        <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                        <input type="hidden" name="subject_id" value="${
                                            data.id
                                        }">
                                        <div class="md-5">
                                        <select class="form-select form-select-sm mb-3" aria-label="Small select"
                                        id="user_ids${
                                            data.id
                                        }" name="user_ids[]" multiple required>
                                        ${
                                            res[0]
                                                ? (() => {
                                                      let optionsHTML = "";
                                                      for (
                                                          let i = 0;
                                                          i < res[0].length;
                                                          i++
                                                      ) {
                                                          var user = res[0][i];
                                                          if (
                                                              user.id != admin
                                                          ) {
                                                              optionsHTML += `
                                                        <option id="stud${data.id}${user.id}" name="name" value="${user.id}">
                                                            ${user.name}
                                                        </option>
                                            `;
                                                          }
                                                      }
                                                      return optionsHTML;
                                                  })()
                                                : ""
                                        }
                                        </select>

                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" data-id="${
                                            data.id
                                        }"
                                            class="btn btn-success add_subject_user_btn">Save</button>
                                    </div>
                                    </form>
                        </div>
                    </div>
                </div>
            `;
                $(".AddModelsubjectUser").append(add_subject_user_model);

                var show_user_subject = `
            <div class="modal fade" aria-hidden="true" id="ModelShowsubject${data.id}" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModelShowsubjectLabel${data.id}" aria-hidden="true">
            <div class="modal-dialog modal-lg w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 " id="ModelShowsubjectLabel${data.id}">${data.subject}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td scope="col">ID User </td>
                                    <td scope="col">Username</td>
                                    <td scope="col">subject</td>
                                    <td scope="col">Mark</td>
                                    <td scope="col">Edit</td>
                                    <td scope="col">delete</td>
                                </tr>
                            </thead>
                            <tbody id="tr_show_user_subject${data.id}">
                            </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            `;
                $(".ModelShowsubject").append(show_user_subject);
            },

            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });
});
