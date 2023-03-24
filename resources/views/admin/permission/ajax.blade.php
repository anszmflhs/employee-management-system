<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('permission.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                },
            ]
        });
    });
    // create
    $("#store").on("submit", function(e) {
        e.preventDefault()
        $.ajax({
            url: "{{ route('permission.store') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if ($.isEmptyObject(response.error)) {
                    $("#createModal").modal("hide")
                    $('#dataTable').DataTable().ajax.reload()
                    Swal.fire(
                        '',
                        response.message,
                        'success'
                    )
                    resetForm()
                } else {
                    printErrorMsg(response.error)
                }
            },
            error: function(err) {
                if (err.status == 403) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Not allowed!'
                    })
                }
            }
        });
    })
    // create-error-validation
    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>')
        });
    }
    // edit
    $("body").on("click", ".edit-button", function() {
        var id = $(this).attr("id")
        $.ajax({
            url: "/permission/" + id,
            method: "GET",
            success: function(response) {
                $("#id_edit").val(response.data.id)
                $("#name_edit").val(response.data.name)
                $("#editModal").modal("show")
            },
            error: function(err) {
                if (err.status == 403) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Not allowed!'
                    })
                }
            }
        })
    })
    // update
    $("#update").on("submit", function(e) {
        e.preventDefault()
        var id = $("#id_edit").val()
        console.log(id);
        $.ajax({
            url: "/permission/" + id,
            method: "PUT",
            data: $(this).serialize(),
            success: function(response) {
                if ($.isEmptyObject(response.error)) {
                    $("#editModal").modal("hide")
                    $('#dataTable').DataTable().ajax.reload()
                    Swal.fire(
                        '',
                        response.message,
                        'success'
                    )
                } else {
                    printErrorMsg(response.error)
                }
            },
            error: function(err) {
                if (err.status == 403) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Not allowed!'
                    })
                }
            }
        })
    })
    // delete
    $("body").on("click", ".delete-button", function() {
        var id = $(this).attr("id")
        Swal.fire({
            title: 'Yakin hapus data ini?',
            // text: "You won't be able to revert",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/permission/" + id,
                    method: "DELETE",
                    success: function(response) {
                        $('#dataTable').DataTable().ajax.reload()
                        Swal.fire(
                            '',
                            response.message,
                            'success'
                        )
                    },
                    error: function(err) {
                        if (err.status == 403) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Not allowed!'
                            })
                        }
                    }
                })
            }
        })
    })
    // // Edit
    // $('body').on('click', '.edit-button', function() {
    //     var id = $(this).attr('id');
    //     console.log('ID EDIT' + id);
    // })
    // // DELETE
    // $('body').on('click', '.delete-button', function() {
    //     var id = $(this).attr('id');
    //     console.log('ID DELETE' + id);
    // })
</script>
