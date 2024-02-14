$(document).ready(function () {
    var form = $("#form_subject");
    $("#create_subject").click(function () {
        var formData = form.serialize();
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                // var editModel =
                //     '<div class="modal fade " data-bs-theme="dark" id="EditModelsubject' +
                //     data.id +
                //     '" data-bs-backdrop="static"data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModelsubjectLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5 text-light" id="EditModelsubjectLabel">' +
                //     data.subject +
                //     '</h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><div class="container"> <form id="form_edit_subject" action=' +
                //     url_updata +
                //     "/" +
                //     data.id +
                //     ' method="post">'+
                //     '<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">'+
                //     '<input type="hidden" name="_method" value="put">' +
                //     '<div class="form"><div class="md-5"><label for="subject" class="form-label text-light">subject</label><input type="text" name="editsubject" id="editsubject" class="form-control"placeholder="Enter subject:" value="' +
                //     data.subject +
                //     '"></div><div class="md-5"><label for="Mark" class="form-label text-light">Mark</label> <input type="number" name="editmark" id="Mark" class="form-control" placeholder="Enter Mark:" value="' +
                //     data.full_mark +
                //     '"></div></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="submit"  class="btn btn-success" id="btn_update">update</button></div></div></form></div></div></div>';
                //     $("#editModel").append(editModel);

                var editModel =`<div class="modal fade" data-bs-theme="dark" id="EditModelsubject${data.id}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditModelsubjectLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-light" id="EditModelsubjectLabel">${data.subject}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form id="form_edit_subject${data.id}" action="${url_updata}/${data.id}" method="post">
                                    <input type="hidden" name="_token" value="NJfSe9yWbQh8Eaouah6DM21SRZYSGkBE1W2Fr4X3" autocomplete="off">
                                    <input type="hidden" name="_method" value="put">
                                    <div class="form">
                                        <div class="md-5">
                                            <label for="subject" class="form-label text-light">Subject</label>
                                            <input type="text" name="editsubject" id="editsubject" class="form-control" placeholder="Enter subject:" value="${data.subject}">
                                        </div>
                                        <div class="md-5">
                                            <label for="Mark" class="form-label text-light">Mark</label>
                                            <input type="number" name="editmark" id="Mark" class="form-control" placeholder="Enter Mark:" value="${data.full_mark}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn_update" data-id="${data.id}" id="btn_update">Update</button>
                        </div>
                        </form>
                    </di
                </div>
            </div>`;
                    $("#editModel").append(editModel);
                    var tr =
                    '<tr id="tr' +
                    data.id +
                    '"><td scope="row">' +
                    data.id +
                    '</td><td scope="row">' +
                    data.subject +
                    '</td><td scope="row">' +
                    data.full_mark +
                    '</td><td scope="row"><button type="button" class="btn btn-success" data-bs-toggle="modal"data-bs-target="#AddModelsubjectUser' +
                    data.id +
                    '"id="addSubjectUser' +
                    data.id +
                    '">Add Student</button></td><td scope="row"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModelShowsubject' +
                    data.id +
                    '"id="showSubjectUser' +
                    data.id +
                    '"">Show</button></td><td scope="row"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditModelsubject' +
                    data.id +
                    '" id="editSubjectUser' +
                    data.id +
                    '">Edit</button></td><td scope="row">' +
                    ' <form id="form_delete_subject' +
                    data.id +
                    '" action="' +
                    url_delete +
                    "/" +
                    data.id +
                    '" method="post">' +
                    '<input type="hidden" name="_token" value="NJfSe9yWbQh8Eaouah6DM21SRZYSGkBE1W2Fr4X3" autocomplete="off">' +
                    '<input type="hidden" name="_method" value="delete">' +
                    '<button type="button" id="btn_delete_subject" class="btn btn-danger">Delete</button>' +
                    "</form></td></tr>";
                $("#res").append(tr);
            },
            error: function (data) {
                console.log("Errou for send data");
                alert("Errou for send data");
            },
        });
    });
});
