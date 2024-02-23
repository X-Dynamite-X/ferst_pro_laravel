$(document).ready(function () {
    var form = $("#form_creat_user");
    $("#creat_user").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                console.log(data);
                var user_show_model = `
                            <div class="modal fade " id="ModelShow${
                                data.id
                            }" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="ModelShowLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="ModelShowLabel">${
                                            data.name
                                        }</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="md-5">
                                            <p class="d-inline  ">ID:</p>
                                            <h5 class='d-inline '>${
                                                data.id
                                            }</h5>
                                        </div>
                                        <div class="md-5">
                                            <p class="d-inline  ">Username:</p>
                                            <h5 class='d-inline '>${
                                                data.name
                                            }</h5>
                                        </div>
                                        <div class="md-5">
                                            <p class="d-inline  ">Email:</p>
                                            <h5 class='d-inline '>${
                                                data.email
                                            }</h5>
                                        </div>
                                        <div class="md-5">
                                            <p class="d-inline  ">acteve:</p>
                                                <h5 scope="md-5" class="d-inline  ${
                                                    data.is_actev
                                                        ? "text-success i"
                                                        : "text-danger"
                                                } ">
                                                ${
                                                    data.is_actev
                                                        ? "Is Actev"
                                                        : "Not Actev"
                                                } </h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#EditModel${
                                                data.id
                                            }"> Edit </button>
                                    </div>
                                </div>
                            </div>
                </div>
                `;
                $("#show_user").append(user_show_model);
                var user_edit_model = `
                <div class="modal fade " id="EditModel${
                    data.id
                }" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="EditModelLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="EditModelLabel">${
                                data.name
                            }</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form id="form_edit_user${data.id}"
                                    action="${url_edit_user}/${
                    data.id
                }" method="post">
                                    <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                    <input type="hidden" name="_method" value="put">
                                    <div class="md-5">
                                        <label for="e_name${
                                            data.id
                                        }" class="form-label ">Username</label>
                                        <input type="text" name="e_name" id="e_name${
                                            data.id
                                        }" class="form-control"
                                            placeholder="Enter Username:" value="${
                                                data.name
                                            }">
                                    </div>
                                    <div class="md-5">
                                        <label for="e_email${
                                            data.id
                                        }" class="form-label">Email</label>
                                        <input type="email" name="e_email" id="e_email${
                                            data.id
                                        }" class="form-control"
                                            placeholder="Enter Email:" value="${
                                                data.email
                                            }">
                                    </div>
                                    <div class="md-5">
                                        <input type="checkbox" name="e_is_actev" id="e_is_actev${
                                            data.id
                                        }" class="form-check-input"
                                            data-id="${data.id}" ${
                    data.is_actev ? "checked" : ""
                }>
                                        <label for="e_is_actev${
                                            data.id
                                        }" class="form-check-label">actev</label>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ModelShow${
                                    data.id
                                }">Show</button>
                            <button type="button" data-id="${data.id}"
                                class="btn btn-success btn_update_user">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            `;
                $(".EditModel").append(user_edit_model);
                var row_user = `
                <tr id='tr${data.id}'>
                    <td scope="row" >${data.id}</td>
                    <td scope="row" id='name${data.id}'>${data.name}</td>
                    <td scope="row" id='email${data.id}'>${data.email}</td>
                    <td scope="row" id='is_actev${data.id}' class="is_actev ${
                    data.is_actev ? "text-success i" : "text-danger"
                }">${data.is_actev ? "Is Actev" : "Not Actev"}</td>
                    <td scope="row">
                        <button type="button" class="btn btn-primary" id="show_user${
                            data.id
                        }" data-bs-toggle="modal" data-bs-target="#ModelShow${
                    data.id
                }">Show </button>
                    </td>
                    <td scope="row">
                        <button type="button" class="btn btn-warning" id="edit_user${
                            data.id
                        }" data-bs-toggle="modal" data-bs-target="#EditModel${
                    data.id
                }">Edit </button>
                    </td>
                    <td scope="row">
                    <form id="form_delete_user${data.id}"
                        action="${url_delete_user}/${data.id}" method="post">
                        <input type="hidden" name="_token" value="${csrf_token}">
                        <input type="hidden" name="_method" value="delete">
                        <button type="button" data-name="${
                            data.name
                        }" data-id="${data.id}"
                            class="btn btn-danger btn_delete_user"
                            id="delete_user${data.id}">Delete</button>
                    </form>
                </td>
                    </tr>`;
                $("#row_user").append(row_user);
            },
            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });
});
