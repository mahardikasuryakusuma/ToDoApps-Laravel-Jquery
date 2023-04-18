$(function () {

    function drawChart(drawChart){
        let jsonData = drawChart;
        let tugas = jsonData[0][0]
        let done = jsonData[0][1]
        let deadline = jsonData[0][2]
        var dom = document.getElementById('pie_basic');
        var myChart = echarts.init(dom, null,{
            renderer: 'svg',
        });
        myChart.setOption( {
            color: [
                '#749f83',
                '#f8eabb',
                '#f4922f',
                '#d48265',
                '#2f4554',
                '#61a0a8',
                '#91c7ae',
                '#ca8622',
                '#6e7074',
                '#546570',
                '#c4ccd3'
            ],
        legend: {
            top: 'bottom',
            bottom: 50
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        toolbox: {
            show: true,
            feature: {
                mark: { show: true },
                dataView: { show: false, readOnly: false },
                restore: { show: false },
                saveAsImage: { show: false }
            }
        },
        series: [
            {
            name: '',
            type: 'pie',
            radius: [10, 100],
            center: ['50%', '40%'],
            roseType: 'area',
            itemStyle: {
                borderRadius: 8
            },
            data: [
                { value: done, name: 'Success Task' },
                { value: tugas, name: 'On Going Task' },
                { value: deadline, name: 'Expired Task' }
            ]
            }
        ]
    });


        window.addEventListener('resize', function(){
            myChart.resize();
        })
    }
        function load_data(){
            $.ajax({
                url:'fetchData',
                serverSide: true,
                method: 'GET',
                data:{
                    "_token":"{{ csrf_token() }}"
                },
                dataType: 'JSON',
                success: function(data){
                    drawChart(data)
                }
            })
        }
        load_data()
            // ---------------------------------------------------render on going task-------------------------
    let table = $('.data-tugas').DataTable({
            serverSide: true,
            ajax: "tugas-ajax-crud-index",
            "dom": 'rtip',
            paging:false,
            "info": false,
            "ordering":false,
            'columnDefs': [{
                "targets": 0,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    let tugas = row["tugas"];
                    let description = row["description"];
                    let waktu_awal = row["waktu_awal"];
                    let waktu_akhir = row["waktu_akhir"];
                    let action = row["action"];
                    let id = row["id"];
                    function getTimeRemaining(waktu_akhir){
                            const total = Date.parse(waktu_akhir) - Date.parse(new Date());
                            const seconds = Math.floor( (total/1000) % 60 );
                            const minutes = Math.floor( (total/1000/60) % 60 );
                            const hours = Math.floor( (total/(1000*60*60)) % 24 );
                            const days = Math.floor( total/(1000*60*60*24) );
                            return {
                                    total,
                                    days,
                                    hours,
                                    minutes,
                                    seconds
                                };
                            }
                    const t = getTimeRemaining(waktu_akhir)
                    const hari = t.days
                    const jam = t.hours
                    const menit = t.minutes
                    const detik = t.seconds
                    let waktuPemberian= new Date(waktu_awal)
                    let waktuStart= waktuPemberian.toString()
                    let waktuStartFinal= waktuStart.split(' ').slice(0, 5).join(' ');

                    let waktuSelesai = new Date(waktu_akhir);
                    let waktuEnd=waktuSelesai.toString();
                    let waktuEndFinal = waktuEnd.split(' ').slice(0, 5).join(' ');
                    let generatedNodeText ="<div class='accordion-item berjalan'>"
                        generatedNodeText += "<h2 class='accordion-header' id='flush-heading"+ id + "'>"
                        generatedNodeText += "<button class='accordion-button berjalan collapsed d-flex justify-content-between' id='button-judul' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse"+id+"' aria-expanded='false' aria-controls='flush-collapse"+id+"'><div class='coverHeadAccor'><div>"+tugas+ "</div></div></button></h2>"
                        generatedNodeText +=  "<div id='flush-collapse"+id+"' class='accordion-collapse collapse' aria-labelledby='flush-heading"+id+"' data-bs-parent='#accordion-body-on'>"
                        generatedNodeText +=  "<div class='accordion-body'><div class='timer-tugas'><div class='cover-timer'><table class='tabel-time-accor'><tbody><tr><td class='child1'>Start Task </td><td class='child2'> : </td><td class='child3'>"+waktuStartFinal+"</td></tr><tr><td class='child1'>End Task </td><td class='child2'> : </td><td class='child3'>"+waktuEndFinal+"</td></tr><tr><td class='child1'>Countdown</td><td class='child2'>:</td><td class='child3'>"+ " "+hari +" days "+jam+" hours "+menit+" minutes "+"</td></tr><tr><td class='child1'>Description</td><td class='child2'>:</td><td class='childDesc'>"+ description+"</td></tr></tbody></table></div><div class='dropdown'><button class='btn dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fa-solid fa-circle-chevron-down'></i></button><ul class='dropdown-menu'>"+action+" </ul></div></div></div></div></div>";
                        return generatedNodeText;
                }
        }],
        language: {
            emptyTable: 'No Task available'
        },
        });
        $("#on-going" ).on('click', function() {
            table.ajax.reload(null, false);
            load_data()
        });
        // ------------------------------render task done -----------------------------------------------
        let tableDone = $('.data-tugas-success').DataTable({
            serverSide: true,
            ajax: "tugasDone-ajax-crud-index",
            "dom": 'rtip',
            paging:false,
            "info": false,
            "ordering":false,
            'columnDefs': [{
                "targets": 0,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    var tugas = row["tugas"];
                    var description = row["description"];
                    var waktu_awal = row["waktu_awal"];
                    var waktu_akhir = row["waktu_akhir"];
                    var action = row["action"];
                    var dikumpulkan = row["created_at"]
                    var id = row["id"];
                    function getTimeRemaining(waktu_akhir){
                            const total = Date.parse(waktu_akhir) - Date.parse(new Date());
                            const seconds = Math.floor( (total/1000) % 60 );
                            const minutes = Math.floor( (total/1000/60) % 60 );
                            const hours = Math.floor( (total/(1000*60*60)) % 24 );
                            const days = Math.floor( total/(1000*60*60*24) );
                            return {
                                    total,
                                    days,
                                    hours,
                                    minutes,
                                    seconds
                                };
                            }
                    const t = getTimeRemaining(waktu_akhir)
                    const hari = t.days
                    const jam = t.hours
                    const menit = t.minutes
                    const detik = t.seconds
                    let waktuPemberian= new Date(waktu_awal)
                    let waktuStart= waktuPemberian.toUTCString()
                    let waktuStartFinal= waktuStart.split(' ').slice(0, 5).join(' ');

                    let waktuSelesai = new Date(waktu_akhir);
                    let waktuEnd=waktuSelesai.toString();
                    let waktuEndFinal = waktuEnd.split(' ').slice(0, 5).join(' ');

                    let waktuDikumpulkan = new Date(dikumpulkan);
                    let timeStored = waktuDikumpulkan.toString();
                    let waktuDikumpulkanFinal = timeStored.split(' ').slice(0,5).join(' ');
                    var generatedNodeText ="<div class='accordion-item sukses'>"
                        generatedNodeText += "<h2 class='accordion-header' id='flush-heading"+ id + "'>"
                        generatedNodeText += "<button class='accordion-button sukses collapsed ' id='button-judul' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse" + id +"' aria-expanded='false' aria-controls='flush-collapse"+id+"'>"+tugas+"</button></h2>"
                        generatedNodeText +=  "<div id='flush-collapse"+id + "' class='accordion-collapse collapse' aria-labelledby='flush-heading"+id+"' data-bs-parent='#accordion-body-success'>"
                        generatedNodeText +=  "<div class='accordion-body'><div class='timer-tugas'><div class='cover-timer'><table class='tabel-time-accor'><tbody><tr><td class='child1'>Start Task </td><td class='child2'> : </td><td class='child3'>"+waktuStartFinal+"</td></tr><tr><td class='child1'>End Task </td><td class='child2'> : </td><td class='child3'>"+waktuEndFinal+"</td></tr><tr><td class='child1'>Collected At</td><td class='child2'>:</td><td class='child3'>"+waktuDikumpulkanFinal +"</td></tr><tr><td class='child1'>Description</td><td class='child2'>:</td><td class='childDesc'>"+ description+"</td></tr></tbody></table></div><div class='dropdown'><button class='btn dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fa-solid fa-circle-chevron-down'></i></button><ul class='dropdown-menu'>"+action+" </ul></div></div></div></div></div>";

                    return generatedNodeText;
                }
        }],
        language: {
            emptyTable: 'No Task available'
        }
        });
        $("#on-done" ).click(function() {
            tableDone.ajax.reload(null, false);
            load_data()
        });
        // ------------------------------------------render deadline task----------------------------
        var tableDeadline = $('.data-tugas-deadline').DataTable({
            serverSide: true,
            ajax: "tugasDeadline-ajax-crud-index",
            "dom": 'rtip',
            paging:false,
            "info": false,
            "ordering":false,
            'columnDefs': [{
                "targets": 0,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    var tugas = row["tugas"];
                    var description = row["description"];
                    var waktu_awal = row["waktu_awal"];
                    var waktu_akhir = row["waktu_akhir"];
                    var action = row["action"];
                    var id = row["id"];
                    var countDownDate = new Date(waktu_akhir);
                    function getTimeRemaining(waktu_akhir){
                            const total = Date.parse(new Date()) - Date.parse(waktu_akhir) ;
                            const seconds = Math.floor( (total/1000) % 60 );
                            const minutes = Math.floor( (total/1000/60) % 60 );
                            const hours = Math.floor( (total/(1000*60*60)) % 24 );
                            const days = Math.floor( total/(1000*60*60*24) );
                            return {
                                    total,
                                    days,
                                    hours,
                                    minutes,
                                    seconds
                                };
                            }
                    // console.log(jumlah)
                    const t = getTimeRemaining(waktu_akhir)
                    const hari = t.days
                    const jam = t.hours
                    const menit = t.minutes
                    const detik = t.seconds
                    let waktuPemberian= new Date(waktu_awal)
                    let waktuStart= waktuPemberian.toString()
                    let waktuStartFinal= waktuStart.split(' ').slice(0, 5).join(' ');

                    let waktuSelesai = new Date(waktu_akhir);
                    let waktuEnd=waktuSelesai.toString();
                    let waktuEndFinal = waktuEnd.split(' ').slice(0, 5).join(' ');

                    var generatedNodeText ="<div class='accordion-item kadaluarsa'>"
                        generatedNodeText += "<h2 class='accordion-header' id='flush-heading"+ id + "'>"
                        generatedNodeText += "<button class='accordion-button kadaluarsa collapsed ' id='button-judul' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse" + id +"' aria-expanded='false' aria-controls='flush-collapse"+id+"'>"+tugas+"</button></h2>"
                        generatedNodeText +=  "<div id='flush-collapse"+id + "' class='accordion-collapse collapse' aria-labelledby='flush-heading"+id+"' data-bs-parent='#accordion-body-deadline'>"
                        generatedNodeText +=  "<div class='accordion-body'><div class='timer-tugas'><div class='cover-timer'><table class='tabel-time-accor'><tbody><tr><td class='child1'>Start Task </td><td class='child2'> : </td><td class='child3'>"+waktuStartFinal+"</td></tr><tr><td class='child1'>End Task </td><td class='child2'> : </td><td class='child3'>"+waktuEndFinal+"</td></tr><tr><td class='child1'>Missed Time</td><td class='child2'>:</td><td class='child3'>" + " "+hari +" days "+jam+" hours "+menit+" minutes "+"</td></tr><tr><td class='child1'>Description</td><td class='child2'>:</td><td class='childDesc'>"+ description+"</td></tr></tbody></table></div><div class='dropdown'><button class='btn dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fa-solid fa-circle-chevron-down'></i></button><ul class='dropdown-menu'>"+action+" </ul></div></div></div></div></div>";

                    return generatedNodeText;
                }
        }],
            language: {
                emptyTable: 'No Task available'
            }
        });
        $("#on-deadline" ).click(function() {
            tableDeadline.ajax.reload(null, false);
            load_data()
        });
        /*------------------------------------------Click to Edit Button--------------------------------------------*/
        $('body').on('click', '.editTugas', function () {
        var id = $(this).data('id');
        $.get("tugas-ajax-crud-edit/" + id, function (data) {
            $('#modelHeadingTugas').html("Edit Task");
            $('#saveBtnTugas').val("edit-user");
            $('#saveBtnTugas').html("Save Change");
            $('#ajaxModelTugas').modal('show');
            $('#id_tugas').val(data.id);
            $('#tugas').val(data.tugas);
            $('#waktu_awal').val(data.waktu_awal);
            $('#waktu_akhir').val(data.waktu_akhir);
            $('#description').val(data.description);
        })
        });
        // -------------------------------------------------edit Deadline Task
        $('body').on('click', '.editTugasDeadline', function () {
        var id = $(this).data('id');
        $.get("tugasDeadline-ajax-crud-edit/" + id, function (data) {
            $('#modelHeadingTugasDeadline').html("Edit Task");
            $('#saveBtnTugasDeadline').val("edit-user");
            $('#ajaxModelTugasDeadline').modal('show');
            $('#id_tugasDeadline').val(data.id);
            $('#tugasDeadline').val(data.tugas);
            $('#waktu_awalDeadline').val(data.waktu_awal);
            $('#waktu_akhirDeadline').val(data.waktu_akhir);
            $('#descriptionDeadline').val(data.description);
        })
        });
        /*------------------------------------------Click  Create Task Button--------------------------------------------*/
        $('#createNewTask').click(function () {
            $('#saveBtnTugas').val("create-tugas");
            $('#saveBtnTugas').html("Add Task");
            $('#id_tugas').val('');
            $('#tugasForm').trigger("reset");
            $('#modelHeadingTugas').html("Create New Task");
            $('#ajaxModelTugas').modal('show');
        });
        /*------------------------------------------Create TASK--------------------------------------------*/
        $('#saveBtnTugas').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#tugasForm').serialize(),
                url: "tugas-ajax-crud-store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#text-success').html('The assignment has been saved!!')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    $('#tugasForm').trigger("reset");
                    $('#ajaxModelTugas').modal('hide');
                    table.draw();
                    tableDeadline.ajax.reload()
                    table.ajax.reload();
                    load_data()
                },
                error: function (data) {
                    $('#text-error-modal').html('Please enter the data correctly')
                    $("#response-add-error-modal").show();
                    setTimeout(function() { $("#response-add-error-modal").hide(); }, 4000);
                }
            });
        });
        // ----------------------------------------------save edit deadline task
        $('#saveBtnTugasDeadline').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#tugasDeadlineForm').serialize(),
                url: "tugasDeadline-ajax-crud-store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#text-success').html('The assignment has been saved!!')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    $('#tugasDeadlineForm').trigger("reset");
                    $('#ajaxModelTugasDeadline').modal('hide');
                    tableDeadline.ajax.reload(null, false);
                    tableDeadline.draw();
                    tableDeadline.ajax.reload();
                    load_data()
                },
                error: function (data) {
                    $('#text-error-modal-deadline').html('Please enter the data correctly')
                    $("#response-add-error-modal-deadline").show();
                    setTimeout(function() { $("#response-add-error-modal-deadline").hide(); }, 4000);
                }
            });
        });
        /*---------------------------------------------Delete Task----------------------*/
        $('body').on('click', '.deleteTugas', function () {
            var id = $(this).data("id");
            // confirm("Are You sure want to delete !");
            $.ajax({
                type: "POST",
                url: "tugas-ajax-crud-delete/"+id,
                success: function (data) {
                    $('#text-warning').html('The task has been deleted')
                    $("#response-add-warning").show();
                    setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                    table.draw();
                    load_data()
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        /*---------------------------------------------Delete Task Done----------------------*/
        $('body').on('click', '.deleteTugasDone', function () {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "tugasDone-ajax-crud-delete/"+id,
                success: function (data) {
                    $('#text-warning').html('The task has been deleted')
                    $("#response-add-warning").show();
                    setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                    tableDone.draw();
                    load_data()
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        // -------------------------------------------delete task deadline
        $('body').on('click', '.deleteTugasDeadline', function () {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "tugasDeadline-ajax-crud-delete/"+id,
                success: function (data) {
                    $('#text-warning').html('The task has been deleted')
                    $("#response-add-warning").show();
                    setTimeout(function() { $("#response-add-warning").hide(); }, 4000);
                    tableDeadline.draw();
                    load_data()
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        // ----------------------------------------------------task done ---------------------
        $('body').on('click', '.doneTugas', function () {
            var id = $(this).data("id");
            // console.log(id)
            $.ajax({
                type: "POST",
                url: "tugas-ajax-done/"+id,
                success: function (data) {
                    $('#text-success').html('Task has ben completed!')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    table.draw();
                    tableDone.draw();
                    tableDone.ajax.reload();

            load_data()
                },
                error: function (data) {
                    $('#text-error').html('Please refresh this page')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                }
            });
        });
        /*------------------------------------------   Click to Edit Button --------------------------------------------*/
        $('body').on('click', '.editTugasDone', function () {
        var id = $(this).data('id');
        $.get("tugasDone-ajax-crud-edit/"+ id, function (data) {
            $('#modelHeadingTugasDone').html("Edit Task");
            $('#saveBtnTugasDone').val("edit-user");
            $('#ajaxModelTugasDone').modal('show');
            $('#id_tugasDone').val(data.id);
            $('#tugasDone').val(data.tugas);
            $('#waktu_awalDone').val(data.waktu_awal);
            $('#waktu_akhirDone').val(data.waktu_akhir);
            $('#descriptionDone').val(data.description);
        })
        });
        /*------------------------------------------Create Product Code--------------------------------------------*/
        $('#saveBtnTugasDone').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#tugasDoneForm').serialize(),
                url: "tugasDone-ajax-crud-store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#text-success').html('The assignment has been saved!!')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    $('#tugasDoneForm').trigger("reset");
                    $('#ajaxModelTugasDone').modal('hide');
                    tableDone.draw();
                    tableDone.ajax.reload();
                    load_data()
                },
                error: function (data) {
                    $('#text-error-modal-done').html('Please enter the data correctly')
                    $("#response-add-error-modal-done").show();
                    setTimeout(function() { $("#response-add-error-modal-done").hide(); }, 4000);
                }
            });
        });
        $('body').on('click', '.moveTugasOn', function () {
            var id = $(this).data("id");
            // console.log(id)
            $.ajax({
                type: "POST",
                url: "tugas-ajax-moveTaskDone/"+id,
                success: function (data) {
                    $('#text-warning').html('The assignment submission has been canceled!!')
                    $("#response-add-warning").show();
                    setTimeout(function() { $("#response-add-warning").hide(); }, 4000);

                    table.draw();
                    tableDone.draw();
                    table.ajax.reload();
                    tableDeadline.ajax.reload();
                    load_data()
                },
                error: function (data) {
                    $('#text-error').html('Please refresh this page')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                }
            });
        });
        $('body').on('click', '.doneTugasDeadline', function () {
            var id = $(this).data("id");
            // console.log(id)
            $.ajax({
                type: "POST",
                url: "tugas-ajax-doneDeadline/"+id,
                success: function (data) {
                    $('#text-success').html('Task has ben completed!')
                    $("#response-add-success").show();
                    setTimeout(function() { $("#response-add-success").hide(); }, 4000);

                    table.draw();
                    tableDone.draw();
                    tableDeadline.ajax.reload();
                    load_data()
                },
                error: function (data) {
                    $('#text-error').html('Please refresh this page')
                    $("#response-add-error").show();
                    setTimeout(function() { $("#response-add-error").hide(); }, 4000);
                }
            });
        });

    });

$("#side-activator").click(function(){
    $(".navigation-side").toggleClass("active")
    $(".content").toggleClass("active")
    $(".content-container").toggleClass("active")
})
