
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#response-add-success').hide();
    $('#response-add-error').hide();
    $('#response-add-error-modal').hide();
    $('#response-add-error-modal-done').hide();
    $('#response-add-error-modal-deadline').hide();
    $('#response-add-warning').hide();
    /*------------------------------------------    Render DataTable  --------------------------------------------*/
    var table = $('.data-table-minggu').DataTable({
    //   processing: true,
        serverSide: true,
        ajax: "minggu-ajax-crud-index",
        "dom": 'rtip',
        paging:false,
        "info": false,
        "ordering":false,
        columns: [
            {data: 'waktu', name: 'waktu'},
            {data: 'jadwal', name: 'jadwal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        language: {
            emptyTable: 'No Schedule Available'
        }
    });
    /*------------------------------------------    Click to Edit Button    --------------------------------------------*/
    $('body').on('click', '.editProduct', function () {
        var id = $(this).data('id');
        $.get("minggu-ajax-crud-edit/" + id, function (data) {
            $('#modelHeading').html("Edit Sunday Schedule");
            $('#saveBtnEdit').val(data.id);
            $('#ajaxModel').modal('show');
            $('#id_edit').val(data.id);
            $('#waktu').val(data.waktu);
            $('#jadwal').val(data.jadwal);
        })
    });
    /*------------------------------------------    Create Product Code    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#tambah_minggu').serialize(),
            url: "minggu-ajax-crud-store",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Schedule saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#myTable').remove();
                $('#tambah_minggu').hide('slow');
                let tombol = document.getElementById("tombol");
                tombol.setAttribute("onclick","myFunction()")
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    $('#saveBtnEdit').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        // $(this).html('Sending..');
        $.ajax({
            data: $('#edit_minggu').serialize(),
            url: "minggu-ajax-crud-update/"+id,
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Changes saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#edit_minggu').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly or refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                $('#edit_minggu').trigger("reset");
                $('#ajaxModel').modal('hide');
            }
        });
    });
    /*------------------------------------------    Delete Product Code -------------------------------------------*/
    $('body').on('click', '.deleteProduct', function () {
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "minggu-ajax-crud-delete/"+id,
            success: function (data) {
                $('#text-warning').html('Schedule deleted successfully')
                $("#response-add-warning").show();
                setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Error!! Please refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    });

// ----------------------------------------------jadwal senin
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.data-table-senin').DataTable({
    //   processing: true,
        serverSide: true,
        ajax: "senin-ajax-crud-index",
        "dom": 'rtip',
        paging:false,
        "info": false,
        "ordering":false,
        columns: [
            {data: 'waktu', name: 'waktu'},
            {data: 'jadwal', name: 'jadwal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        language: {
            emptyTable: 'No Schedule Available'
        }
    });
    /*------------------------------------------    Click to Edit Button    --------------------------------------------*/
    $('body').on('click', '.editSenin', function () {
    var id = $(this).data('id');
    $.get("senin-ajax-crud-edit/" + id , function (data) {
        $('#modelHeadingMonday').html("Edit Monday Schedule");
        $('#saveBtnEditSenin').val(data.id);
        $('#ajaxModelSenin').modal('show');
        $('#id_editSenin').val(data.id);
        $('#waktuSenin').val(data.waktu);
        $('#jadwalSenin').val(data.jadwal);
    })
    });
    /*------------------------------------------    Create Product Code    --------------------------------------------*/
    $('#saveBtnSenin').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#tambah_senin').serialize(),
            url: "senin-ajax-crud-store",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Schedule saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#myTableSenin').remove();
                $('#tambah_senin').hide('slow');
                let tombol = document.getElementById("tombolSenin");
                tombol.setAttribute("onclick","myFunctionSenin()")
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    $('#saveBtnEditSenin').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            data: $('#edit_senin').serialize(),
            url: "senin-ajax-crud-update/"+id,
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Changes saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#edit_senin').trigger("reset");
                $('#ajaxModelSenin').modal('hide');
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly or refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                $('#edit_senin').trigger("reset");
                $('#ajaxModelSenin').modal('hide');
            }
        });
    });
    /*-------------------- --------------------------------------------Delete Product Code----------------------------------------------------------------------------------------*/
    $('body').on('click', '.deleteSenin', function () {
        var id = $(this).data("id");
        // confirm("Are You sure want to delete !");
        $.ajax({
            type: "POST",
            url: "senin-ajax-crud-delete"+'/'+id,
            success: function (data) {
                $('#text-warning').html('Schedule deleted successfully')
                $("#response-add-warning").show();
                setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Error!! Please refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    });

    // --------------------------------------------------------------------script selasa
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        /*Render DataTable--------------------------------------------*/
        var table = $('.data-table-selasa').DataTable({
        //   processing: true,
            serverSide: true,
            ajax: "selasa-ajax-crud-index",
            "dom": 'rtip',
            paging:false,
            "info": false,
            "ordering":false,
            columns: [
                {data: 'waktu', name: 'waktu'},
                {data: 'jadwal', name: 'jadwal'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            language: {
                emptyTable: 'No Schedule Available'
            }
        });
        /*------------------------------------------Click to Edit Button--------------------------------------------*/
        $('body').on('click', '.editSelasa', function () {
        var id = $(this).data('id');
        $.get("selasa-ajax-crud-edit/"+ id, function (data) {
            $('#modelHeadingTuesday').html("Edit Tuesday Schedule");
            $('#saveBtnEditSelasa').val(data.id);
            $('#ajaxModelSelasa').modal('show');
            $('#id_editSelasa').val(data.id);
            $('#waktuSelasa').val(data.waktu);
            $('#jadwalSelasa').val(data.jadwal);
        })
        });
        /*------------------------------------------Create Product Code--------------------------------------------*/
        $('#saveBtnSelasa').click(function (e) {
            e.preventDefault();
            // $(this).html('Sending..');
            $.ajax({
                data: $('#tambah_selasa').serialize(),
                url: "selasa-ajax-crud-store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#text-success').html('Schedule saved successfully')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    $('#myTableSelasa').remove();
                    $('#tambah_selasa').hide('slow');
                    let tombol = document.getElementById("tombolSelasa");
                    tombol.setAttribute("onclick","myFunctionSelasa()")
                    table.draw();
                },
                error: function (data) {
                    $('#text-error').html('Please enter the data correctly')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                }
            });
        });
        /*--------------------------------------------*/
        $('#saveBtnEditSelasa').click(function (e) {
            e.preventDefault();
            var id = $(this).val();
            // $(this).html('Sending..');
            $.ajax({
                data: $('#edit_selasa').serialize(),
                url: "selasa-ajax-crud-update/"+id,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#text-success').html('Changes saved successfully')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    $('#edit_selasa').trigger("reset");
                    $('#ajaxModelSelasa').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    $('#text-error').html('Please enter the data correctly or refresh this page')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                    $('#edit_selasa').trigger("reset");
                    $('#ajaxModelSelasa').modal('hide');
                }
            });
        });
        /*------------------------------------------ Delete Product Code --------------------------------------------*/
        $('body').on('click', '.deleteSelasa', function () {
            var id = $(this).data("id");
            // confirm("Are You sure want to delete !");
            $.ajax({
                type: "POST",
                url: "selasa-ajax-crud-delete/"+id,
                success: function (data) {
                    $('#text-warning').html('Schedule deleted successfully')
                    $("#response-add-warning").show();
                    setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                    table.draw();
                },
                error: function (data) {
                    $('#text-error').html('Error!! Please refresh this page')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                }
            });
        });
        });

        // -------------------------------------------------------------------------------------------script rabu
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
            /*Render DataTable
            --------------------------------------------*/
            var table = $('.data-table-rabu').DataTable({
            //   processing: true,
                serverSide: true,
                ajax: "rabu-ajax-crud-index",
                "dom": 'rtip',
                paging:false,
                "info": false,
                "ordering":false,
                columns: [
                    {data: 'waktu', name: 'waktu'},
                    {data: 'jadwal', name: 'jadwal'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                language: {
                    emptyTable: 'No Schedule Available'
                }
            });
            /*------------------------------------------
            Click to Edit Button
            --------------------------------------------*/
            $('body').on('click', '.editRabu', function () {
            var id = $(this).data('id');
            $.get("rabu-ajax-crud-edit/" + id , function (data) {
                $('#modelHeadingWednesday').html("Edit Wednesday Schedule");
                $('#saveBtnEditRabu').val(data.id);
                $('#ajaxModelRabu').modal('show');
                $('#id_editRabu').val(data.id);
                $('#waktuRabu').val(data.waktu);
                $('#jadwalRabu').val(data.jadwal);
            })
            });
            /*------------------------------------------
            Create Product Code
            --------------------------------------------*/
            $('#saveBtnRabu').click(function (e) {
                e.preventDefault();
                // $(this).html('Sending..');
                $.ajax({
                    data: $('#tambah_rabu').serialize(),
                    url: "rabu-ajax-crud-store",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#text-success').html('Schedule saved successfully')
                        $("#response-add-success").show();
                        setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                        $('#myTableRabu').remove();
                        $('#tambah_rabu').hide('slow');
                        let tombol = document.getElementById("tombolRabu");
                        tombol.setAttribute("onclick","myFunctionRabu()")
                        table.draw();
                    },
                    error: function (data) {
                        $('#text-error').html('Please enter the data correctly')
                        $("#response-add-error").show();
                        setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                    }
                });
            });
            /*--------------------------------------------*/
            $('#saveBtnEditRabu').click(function (e) {
                e.preventDefault();
                var id = $(this).val();
                // $(this).html('Sending..');
                $.ajax({
                    data: $('#edit_rabu').serialize(),
                    url: "rabu-ajax-crud-update/"+id,
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#text-success').html('Changes saved successfully')
                        $("#response-add-success").show();
                        setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                        $('#edit_rabu').trigger("reset");
                        $('#ajaxModelRabu').modal('hide');
                        table.draw();
                    },
                    error: function (data) {
                        $('#text-error').html('Please enter the data correctly or refresh this page')
                        $("#response-add-error").show();
                        setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                        $('#edit_rabu').trigger("reset");
                        $('#ajaxModelRabu').modal('hide');
                    }
                });
            });
            /*------------------------------------------            Delete Product Code            --------------------------------------------*/
            $('body').on('click', '.deleteRabu', function () {
                var id = $(this).data("id");
                // confirm("Are You sure want to delete !");
                $.ajax({
                    type: "POST",
                    url: "rabu-ajax-crud-delete/"+id,
                    success: function (data) {
                        $('#text-warning').html('Schedule deleted successfully')
                        $("#response-add-warning").show();
                        setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                        table.draw();
                    },
                    error: function (data) {
                        $('#text-error').html('Error!! Please refresh this page')
                        $("#response-add-error").show();
                        setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                    }
                });
            });
            });
//------------------------------------------------------------------------------------------- script kamis
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*Render DataTable    --------------------------------------------*/
    var table = $('.data-table-kamis').DataTable({
    //   processing: true,
        serverSide: true,
        ajax: "kamis-ajax-crud-index",
        "dom": 'rtip',
        paging:false,
        "info": false,
        "ordering":false,
        columns: [
            {data: 'waktu', name: 'waktu'},
            {data: 'jadwal', name: 'jadwal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        language: {
            emptyTable: 'No Schedule Available'
        }
    });
    /*------------------------------------------    Click to Edit Button    --------------------------------------------*/
    $('body').on('click', '.editKamis', function () {
    var id = $(this).data('id');
    $.get("kamis-ajax-crud-edit/" +id, function (data) {
        $('#modelHeadingThursday').html("Edit Thursday Schedule");
        $('#saveBtnEditKamis').val(data.id);
        $('#ajaxModelKamis').modal('show');
        $('#id_editKamis').val(data.id);
        $('#waktuKamis').val(data.waktu);
        $('#jadwalKamis').val(data.jadwal);
    })
    });
    /*------------------------------------------    Create Product Code    --------------------------------------------*/
    $('#saveBtnKamis').click(function (e) {
        e.preventDefault();
        // $(this).html('Sending..');
        $.ajax({
            data: $('#tambah_kamis').serialize(),
            url: "kamis-ajax-crud-store",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Schedule saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#myTableKamis').remove();
                $('#tambah_kamis').hide('slow');
                let tombol = document.getElementById("tombolKamis");
                tombol.setAttribute("onclick","myFunctionKamis()")
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    /*--------------------------------------------*/
    $('#saveBtnEditKamis').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        // $(this).html('Sending..');
        $.ajax({
            data: $('#edit_kamis').serialize(),
            url: "kamis-ajax-crud-update/"+id,
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Changes saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#edit_kamis').trigger("reset");
                $('#ajaxModelKamis').modal('hide');
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly or refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                $('#edit_kamis').trigger("reset");
                $('#ajaxModelKamis').modal('hide');
            }
        });
    });
    /*------------------------------------------    Delete Product Code    --------------------------------------------*/
    $('body').on('click', '.deleteKamis', function () {
        var id = $(this).data("id");
        // confirm("Are You sure want to delete !");
        $.ajax({
            type: "POST",
            url: "kamis-ajax-crud-delete/"+id,
            success: function (data) {
                $('#text-warning').html('Schedule deleted successfully')
                $("#response-add-warning").show();
                setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Error!! Please refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    });
//----------------------------------------------------------------------------------------- script jumat
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*Render DataTable    --------------------------------------------*/
    var table = $('.data-table-jumat').DataTable({
    //   processing: true,
        serverSide: true,
        ajax: "jumat-ajax-crud-index",
        "dom": 'rtip',
        paging:false,
        "info": false,
        "ordering":false,
        columns: [
            {data: 'waktu', name: 'waktu'},
            {data: 'jadwal', name: 'jadwal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        language: {
            emptyTable: 'No Schedule Available'
        }
    });
    /*------------------------------------------    Click to Edit Button    --------------------------------------------*/
    $('body').on('click', '.editJumat', function () {
    var id = $(this).data('id');
    $.get("jumat-ajax-crud-edit/" + id, function (data) {
        $('#modelHeadingFriday').html("Edit Friday Schedule");
        $('#saveBtnEditJumat').val(data.id);
        $('#ajaxModelJumat').modal('show');
        $('#id_editJumat').val(data.id);
        $('#waktuJumat').val(data.waktu);
        $('#jadwalJumat').val(data.jadwal);
    })
    });
    /*------------------------------------------    Create Product Code    --------------------------------------------*/
    $('#saveBtnJumat').click(function (e) {
        e.preventDefault();
        // $(this).html('Sending..');
        $.ajax({
            data: $('#tambah_jumat').serialize(),
            url: "jumat-ajax-crud-store",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Schedule saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#myTableJumat').remove();
                $('#tambah_jumat').hide('slow');
                let tombol = document.getElementById("tombolJumat");
                tombol.setAttribute("onclick","myFunctionJumat()")
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    /*--------------------------------------------*/
    $('#saveBtnEditJumat').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        // $(this).html('Sending..');
        $.ajax({
            data: $('#edit_jumat').serialize(),
            url: "jumat-ajax-crud-update/"+id,
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#text-success').html('Changes saved successfully')
                $("#response-add-success").show();
                setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                $('#edit_jumat').trigger("reset");
                $('#ajaxModelJumat').modal('hide');
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Please enter the data correctly or refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                $('#edit_jumat').trigger("reset");
                $('#ajaxModelJumat').modal('hide');
            }
        });
    });
    /*------------------------------------------    Delete Product Code    --------------------------------------------*/
    $('body').on('click', '.deleteJumat', function () {
        var id = $(this).data("id");
        // confirm("Are You sure want to delete !");
        $.ajax({
            type: "POST",
            url: "jumat-ajax-crud-delete/"+id,
            success: function (data) {
                $('#text-warning').html('Schedule deleted successfully')
                $("#response-add-warning").show();
                setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                table.draw();
            },
            error: function (data) {
                $('#text-error').html('Error!! Please refresh this page')
                $("#response-add-error").show();
                setTimeout(function() { $("#response-add-error").hide(); }, 4000);
            }
        });
    });
    });

    // -----------------------------------------------------------------------------------script jadwal sabtu
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /*Render DataTable--------------------------------------------*/
        var table = $('.data-table-sabtu').DataTable({
        //   processing: true,
            serverSide: true,
            ajax: "sabtu-ajax-crud-index",
            "dom": 'rtip',
            paging:false,
            "info": false,
            "ordering":false,
            columns: [
                {data: 'waktu', name: 'waktu'},
                {data: 'jadwal', name: 'jadwal'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            language: {
                emptyTable: 'No Schedule Available'
            }
        });
        /*------------------------------------------        Click to Edit Button        --------------------------------------------*/
        $('body').on('click', '.editSabtu', function () {
        var id = $(this).data('id');
        $.get("sabtu-ajax-crud-edit/"+ id, function (data) {
            $('#modelHeadingSaturday').html("Edit Saturday Schedule");
            $('#saveBtnEditSabtu').val(data.id);
            $('#ajaxModelSabtu').modal('show');
            $('#id_editSabtu').val(data.id);
            $('#waktuSabtu').val(data.waktu);
            $('#jadwalSabtu').val(data.jadwal);
        })
        });
        /*------------------------------------------        Create Product Code        --------------------------------------------*/
        $('#saveBtnSabtu').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#tambah_sabtu').serialize(),
                url: "sabtu-ajax-crud-store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#text-success').html('Schedule saved successfully')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    $('#myTableSabtu').remove();
                    $('#tambah_sabtu').hide('slow');
                    let tombol = document.getElementById("tombolSabtu");
                    tombol.setAttribute("onclick","myFunctionSabtu()")
                    table.draw();
                },
                error: function (data) {
                    $('#text-error').html('Please enter the data correctly')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                }
            });
        });
        /*--------------------------------------------*/
        $('#saveBtnEditSabtu').click(function (e) {
            e.preventDefault();
            var id = $(this).val();
            // $(this).html('Sending..');
            $.ajax({
                data: $('#edit_sabtu').serialize(),
                url: "sabtu-ajax-crud-update/"+id,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#text-success').html('Changes saved successfully')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    $('#edit_sabtu').trigger("reset");
                    $('#ajaxModelSabtu').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    $('#text-error').html('Please enter the data correctly or refresh this page')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                    $('#edit_sabtu').trigger("reset");
                    $('#ajaxModelSabtu').modal('hide');
                }
            });
        });
        /*------------------------------------------        Delete Product Code        --------------------------------------------*/
        $('body').on('click', '.deleteSabtu', function () {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "sabtu-ajax-crud-delete/"+id,
                success: function (data) {
                    $('#text-warning').html('Schedule deleted successfully')
                    $("#response-add-warning").show();
                    setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                    table.draw();
                },
                error: function (data) {
                    $('#text-error').html('Error!! Please refresh this page')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                }
            });
        });
        });

// layout
$(document).ready(function(){
    $('#tambah_minggu').hide();
    $('#tambah_senin').hide();
    $('#tambah_selasa').hide();
    $('#tambah_rabu').hide();
    $('#tambah_kamis').hide();
    $('#tambah_jumat').hide();
    $('#tambah_sabtu').hide();
    $("#DataTables_Table_0").width('100%')
    $("#DataTables_Table_1").width('100%')
    $("#DataTables_Table_2").width('100%')
    $("#DataTables_Table_3").width('100%')
    $("#DataTables_Table_4").width('100%')
    $("#DataTables_Table_5").width('100%')
    $("#DataTables_Table_6").width('100%')
    $("#DataTables_Table_7").width('100%')
    $("#DataTables_Table_8").width('100%')
    $("#DataTables_Table_9").width('100%')
    $("#DataTables_Table_0 > thead").remove()
    $("#DataTables_Table_1 > thead").remove()
    $("#DataTables_Table_2 > thead").remove()
    $("#DataTables_Table_3 > thead").remove()
    $("#DataTables_Table_4 > thead").remove()
    $("#DataTables_Table_5 > thead").remove()
    $("#DataTables_Table_6 > thead").remove()
    $("#DataTables_Table_7 > thead").remove()
    $("#DataTables_Table_8 > thead").remove()
    $("#DataTables_Table_9 > thead").remove()
});
