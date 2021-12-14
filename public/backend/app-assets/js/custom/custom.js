(function($){
    $(document).ready(function(){


        //user Table load by yijra datatable
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/users/list'
            },
            columns: [
                {
                    data: 'photo',
                    name: 'photo',
                    render: function (data, type, full, meta) {
                        return `<img class="user_photo_list" src="/media/users/${data}" alt="">`;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },               
                {
                    data: 'user_type',
                    name: 'user_type'
                },               
                {
                    data: 'status',
                    name: 'status',
                    render: function (data, type, full, meta) {
                        return `
                            
                            <div class="custom-control custom-switch custom-switch-shadow custom-control-inline">
                                <input type="checkbox" data_id="${full.id}" class="custom-control-input user_status_update" id="customSwitchShadow${full.id}" ${full.status == true ? 'checked="checked"' : ''} value="${data}">
                                <label class="custom-control-label" for="customSwitchShadow${full.id}">
                                </label>
                            </div>
                            
                            `;
                    }
                },
                {
                    data: 'trash',
                    name: 'trash',
                    render: function (data, type, full, meta) {
                        return `
                            
                            <div class="custom-control custom-switch custom-switch-shadow custom-control-inline">
                                <input type="checkbox" data_id="${full.id}" class="custom-control-input user_trash_update" id="customSwitchTrashShadow${full.id}" ${full.trash == true ? 'checked="checked"' : ''} value="${data}">
                                <label class="custom-control-label" for="customSwitchTrashShadow${full.id}">
                                </label>
                            </div>
                            
                            `;
                    }
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });


        //user Trash Table load by yijra datatable
        $('#user_trash_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/users/trash-list'
            },
            columns: [
                {
                    data: 'photo',
                    name: 'photo',
                    render: function (data, type, full, meta) {
                        return `<img class="user_photo_list" src="/media/users/${data}" alt="">`;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },               
                {
                    data: 'user_type',
                    name: 'user_type'
                },               
                {
                    data: 'status',
                    name: 'status',
                    render: function (data, type, full, meta) {
                        return `
                            
                            <div class="custom-control custom-switch custom-switch-shadow custom-control-inline">
                                <input type="checkbox" data_id="${full.id}" class="custom-control-input user_status_update" id="customSwitchShadow${full.id}" ${full.status == true ? 'checked="checked"' : ''} value="${data}">
                                <label class="custom-control-label" for="customSwitchShadow${full.id}">
                                </label>
                            </div>
                            
                            `;
                    }
                },
                {
                    data: 'trash',
                    name: 'trash',
                    render: function (data, type, full, meta) {
                        return `
                            
                            <div class="custom-control custom-switch custom-switch-shadow custom-control-inline">
                                <input type="checkbox" data_id="${full.id}" class="custom-control-input user_trash_update" id="customSwitchTrashShadow${full.id}" ${full.trash == true ? 'checked="checked"' : ''} value="${data}">
                                <label class="custom-control-label" for="customSwitchTrashShadow${full.id}">
                                </label>
                            </div>
                            
                            `;
                    }
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });

        
        // User add by ajax
        $(document).on('submit', '#user_add_form', function (e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                url: '/users/list',
                method: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#user_add_form')[0].reset();
                    $('#add_user_modal').modal('hide');
                    $('#user_table').DataTable().ajax.reload();
                }
            });
        });

        //Brand Status update
        $(document).on("change", "input.user_status_update", function () {
            let id = $(this).attr("data_id");
            let value = $(this).val();
            // alert(value);

            $.ajax({
                url: "/users/admin-status-update/" + id + '/' + value,
                success: function (data) {
                    $.notify(data, {
                        globalPosition: "top right",
                        className: "success"
                    });

                    $('#user_table').DataTable().ajax.reload();

                }
            });
        });

       
        //User trash update
        $(document).on("change", "input.user_trash_update", function () {
            let id = $(this).attr("data_id");
            let value = $(this).val();

            $.ajax({
                url: "/users/admin-trash-update/" + id + '/' + value,
                success: function (data) {
                    $.notify(data, {
                        globalPosition: "top right",
                        className: "success"
                    });

                    $('#user_table').DataTable().ajax.reload();
                    $('#user_trash_table').DataTable().ajax.reload();

                }
            });
        });


        // user edit data show modal admin purpose
        $(document).on("click", ".edit_user_data", function (e) {
            e.preventDefault();
            let edit_id = $(this).attr("edit_id");
            // alert(edit_id);

            $.ajax({
                url: "/users/list/" + edit_id,
                type: "GET",
                success: function (data) {
                    $(".f_name").val(data.name);
                    $(".f_email").val(data.email);
                    $(".user_type").val(data.user_type);
                    $(".user_id").val(data.id);

                    $("#edit_users_modal").modal("show");
                },
            });
        });


        
        // user update by ajax
        $(document).on('submit', '#edit_user_form', function (e) {
            e.preventDefault();
            let id = $('.user_id').val();

            // alert(id);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                url: '/users/admin-edit-store',
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {
         
                    $.notify(data.success, {
                        globalPosition: 'top right',
                        className: 'success'
                    });

                    $('#user_table').DataTable().ajax.reload();
                    $('#user_trash_table').DataTable().ajax.reload();
                    $('#edit_users_modal').modal('hide');

                },

            });

        });


        $(document).on('submit', '#user_delete_form', function (e) {
            e.preventDefault();
            let id = $('#delete_user').val();


            swal(
                {
                    title: "Are you sure?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                                    "content"
                                ),
                            },
                            url: '/users/delete',
                            method: 'POST',
                            data: { id: id },
                            success: function (data) {
                                swal(
                                    {
                                        title: "Deleted!",
                                        type: "success"
                                    },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            $.notify(data, {
                                                globalPosition: "top right",
                                                className: 'success'
                                            });
                                            // console.log(data);

                                            $('#user_table').DataTable().ajax.reload();
                                            $('#user_trash_table').DataTable().ajax.reload();
                                        }
                                    }
                                );
                            }
                        });

                    } else {
                        swal("Cancelled", "", "error");
                    }
                }
            );



        });



    });
})(jQuery);
