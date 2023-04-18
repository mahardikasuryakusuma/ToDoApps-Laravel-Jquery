<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Belky Planner for management task and schedule">
    <meta name="keywords" content="Belky Planner, Planner, Schedule, Management, Laravel">
    <meta name="author" content="Mahardika Surya Kusuma">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b0cef64d70.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/asset/gambarIcon/logoBelky.ico">
    <script type="text/javascript" src="/jQuery-3.6.0/jquery-3.6.0.js"></script>

    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/date-1.4.0/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="style/stylehome.css">
    <link rel="stylesheet" href="style/responsiveHome.css">
    <title>Dashboard</title>
</head>
<body onload="startTime()">
    <section class="home">
        <div class="cover-logout">
            <form action="{{ url('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button-logout"><Span class="me-1">Sign Out</Span><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
        <div class="coverGreeting">
            <div class="waktu">
                <div id="txt"></div>
            </div>
            <div class="salam">
                <h1 id="sambutan"></h1>
            </div>
        </div>
        <div class="slider" id="slider">
            <i class="fa-solid fa-chevron-up"></i>
        </div>
    </section>
    <section id="content" class="content">
    <div id="response-add-success" class="alert alert-success alert-dismissible fade show position-absolute" role="alert">
        <p id="text-success" class="text-center"></p>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
    <div id="response-add-error" class="alert alert-danger alert-dismissible fade show position-absolute" role="alert">
        <p id="text-error"  class="text-center"></p>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
    <div id="response-add-warning" class="alert alert-warning alert-dismissible fade show position-absolute" role="alert">
        <p id="text-warning"  class="text-center"></p>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
        <div class="cover-nav-side">
            <div class="navigation-side">
                <ul class="nav-list">
                    <li >
                        <a class="belky">
                            <span id="side-activator" class="icon-top"><i class="fa-solid fa-bars"></i></span>
                            <span class="tittle">
                                <h2>Belky Planner</h2>
                            </span>
                        </a>
                    </li>
                    <li id="scheduleRes" class="list active">
                        <a class="homeContent">
                            <span class="icon"><i class='bx bxs-home'></i></span>
                            <span class="tittle">Home</span>
                        </a>
                    </li>
                    <li id="taskRes" class="list schedule-content">
                        <a class="shceduleContent">
                            <span class="icon"><i class="fa-regular fa-calendar-check"></i></span>
                            <span class="tittle">My Task</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ url('setting') }}">
                            <span class="icon"><i class="fa-solid fa-gear"></i></span>
                            <span class="tittle">Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('about') }}">
                            <span class="icon"><i class="fa-solid fa-circle-info"></i></span>
                            <span class="tittle">About</span>
                        </a>
                    </li>
                    <li>
                        <form action="logout" method="POST">
                            @csrf
                            <button>
                                <span class="icon"><i class='bx bxs-log-out'></i></span>
                                <span class="tittle">Sign Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
                <div class="indicator"></div>
            </div>
        </div>
        <div class="cover-content-jadwal">
            <div class="topbar">
                <div class="call-bx">
                    <h4 class="greeting-first">Have a nice day {{auth()->user()->name}} </h4>
                    <h4 class="greeting-second">Hello, {{ auth()->user()->name }}</h4>
                </div>
                <div class="date">
                    <h4 id="tanggal"></h4>
                </div>
            </div>
            <div class="content-container">
                <!-- ===========  Menampilkan Jadwal=============== -->
                <!-- ===========  value pada input hiden bisa sama dengan hari-hari lain ============= -->
                <div class="jadwal-show active" id="scheduleDis">
                    <h1>Schedule</h1>
                    <div class="tanggal">
                        <div class="list-hari">
                            <ul>
                                <li class="Minggu">
                                    <p class="hMinggu">
                                        Sun
                                    </p>
                                </li>
                                <li class="Senin">
                                    <p class="hSenin">
                                        Mon
                                    </p>
                                </li>
                                <li class="Selasa">
                                    <p class="hSelasa">
                                        Tue
                                    </p>
                                </li>
                                <li class="Rabu">
                                    <p class="hRabu">
                                        Wed
                                    </p>
                                </li>
                                <li class="Kamis">
                                    <p class="hKamis">
                                        Thu
                                    </p>
                                </li>
                                <li class="Jumat">
                                    <p class="hJumat">
                                        Fri
                                    </p>
                                </li>
                                <li class="Sabtu">
                                    <p class="hSabtu">
                                        Sat
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="addJadwalSenin" class="show-jadwal-senin">
                        <div class="container-head-jadwal">
                            <div>
                                <p>Monday</p>
                            </div>
                            <div class="cover-button-add-schedule">
                                <button id="tombolSenin" class="tittle-add-monday"
                                    onclick="myFunctionSenin()"> <i class="fas fa-plus-circle"></i> Add schedule
                                </button>
                            </div>
                        </div>
                        <table class="data-table-senin">
                            <tbody>
                            </tbody>
                        </table>
                        <form id="tambah_senin" name="tambah_senin">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div id="cover-input-senin">
                            </div>
                            <div id="cover-button-senin">
                                <p id="errorInputSenin"></p>
                                <button id="saveBtnSenin">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div id="addJadwalSelasa" class="show-jadwal-selasa">
                        <div class="container-head-jadwal">
                            <div>
                                <p>Tuesday</p>
                            </div>
                            <div class="cover-button-add-schedule" >
                                <button id="tombolSelasa" class="tittle-add-tuesday"
                                    onclick="myFunctionSelasa()"> <i class="fas fa-plus-circle"></i> Add schedule
                                </button>
                            </div>
                        </div>
                        <table class="data-table-selasa">
                            <tbody>
                            </tbody>
                        </table>
                        <form id="tambah_selasa" name="tambah_selasa">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div id="cover-input-selasa">
                            </div>
                            <div id="cover-button-selasa">
                                <p id="errorInputSelasa"></p>
                                <button id="saveBtnSelasa">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div id="addJadwalRabu" class="show-jadwal-rabu">
                        <div class="container-head-jadwal">
                            <div>
                                <p>Wednesday</p>
                            </div>
                            <div class="cover-button-add-schedule" >
                                <button id="tombolRabu" class="tittle-add-tuesday"
                                    onclick="myFunctionRabu()"> <i class="fas fa-plus-circle"></i> Add schedule
                                </button>
                            </div>
                        </div>
                        <table class="data-table-rabu">
                            <tbody>
                            </tbody>
                        </table>
                        <form id="tambah_rabu" name="tambah_rabu">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div id="cover-input-rabu">
                            </div>
                            <div id="cover-button-rabu">
                                <p id="errorInputRabu"></p>
                                <button id="saveBtnRabu">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div id="addJadwalKamis" class="show-jadwal-kamis">
                        <div class="container-head-jadwal">
                            <div>
                                <p>Thursday</p>
                            </div>
                            <div class="cover-button-add-schedule" >
                                <button id="tombolKamis" class="tittle-add-tuesday"
                                    onclick="myFunctionKamis()"> <i class="fas fa-plus-circle"></i> Add schedule
                                </button>
                            </div>
                        </div>
                        <table class="data-table-kamis">
                            <tbody>
                            </tbody>
                        </table>
                        <form id="tambah_kamis" name="tambah_kamis">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div id="cover-input-kamis">
                            </div>
                            <div id="cover-button-kamis">
                                <p id="errorInputKamis"></p>
                                <button id="saveBtnKamis">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div id="addJadwalJumat" class="show-jadwal-jumat">
                        <div class="container-head-jadwal">
                            <div>
                                <p>Friday</p>
                            </div>
                            <div class="cover-button-add-schedule" >
                                <button id="tombolJumat" class="tittle-add-tuesday"
                                    onclick="myFunctionJumat()"> <i class="fas fa-plus-circle"></i> Add schedule
                                </button>
                            </div>
                        </div>
                        <table class="data-table-jumat">
                            <tbody>
                            </tbody>
                        </table>
                        <form id="tambah_jumat" name="tambah_jumat">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div id="cover-input-jumat">
                            </div>
                            <div id="cover-button-jumat">
                                <p id="errorInputJumat"></p>
                                <button id="saveBtnJumat">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div id="addJadwalSabtu" class="show-jadwal-sabtu">
                        <div class="container-head-jadwal">
                            <div>
                                <p>Saturday</p>
                            </div>
                            <div class="cover-button-add-schedule" >
                                <button id="tombolSabtu" class="tittle-add-tuesday"
                                    onclick="myFunctionSabtu()"> <i class="fas fa-plus-circle"></i> Add schedule
                                </button>
                            </div>
                        </div>
                        <table class="data-table-sabtu">
                            <tbody>
                            </tbody>
                        </table>
                        <form id="tambah_sabtu" name="tambah_sabtu">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div id="cover-input-sabtu">
                            </div>
                            <div id="cover-button-sabtu">
                                <p id="errorInputSabtu"></p>
                                <button id="saveBtnSabtu">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div id="addJadwalMinggu" class="show-jadwal-minggu">
                        <div class="container-head-jadwal">
                            <div>
                                <p>Sunday</p>
                            </div>
                            <div class="cover-button-add-schedule" >
                                <button id="tombol" class="tittle-add-sunday"
                                    onclick="myFunction()"> <i class="fas fa-plus-circle"></i> Add schedule
                                </button>
                            </div>
                        </div>
                        <table class="data-table-minggu">
                            <tbody>
                            </tbody>
                        </table>
                        <form id="tambah_minggu" name="tambah_minggu">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div id="cover-input-minggu">
                            </div>
                            <div id="cover-button-minggu">
                                <p id="errorInput"></p>
                                <button id="saveBtn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tugas" id="taskDis">
                    <div class="coverTittle">
                        <h1>Task Management</h1>
                        <div class="cover-button">
                            <button id="createNewTask"><i class="fas fa-plus-circle"></i> Add Task </button>
                        </div>
                    </div>
                    <div class="new-cover">
                        <div class="container-task">
                            {{-- accordion --}}
                            <div class="cover-accordion-task">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item on-going">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button on-going collapsed" id="on-going" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                On Going Task <span id="jumlah"></span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body" id="accordion-body-on">
                                                <table class="data-tugas"></table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item berhasil">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button berhasil collapsed" id="on-done" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Success Task
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body" id="accordion-body-success">
                                                <table class="data-tugas-success"></table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item deadline">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button deadline collapsed" id="on-deadline" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                Expired Task
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body" id="accordion-body-deadline">
                                                <table class="data-tugas-deadline"></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end accordion --}}
                        </div>
                        <div class="container-chart">
                            <div id="pie_basic"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- modal minggu --}}
    <div class="modal schedule fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit_minggu" name="edit_minggu" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Time</label>
                            <div class="col-sm-12 w-50">
                                <input type="time" class="form-control" id="waktu" name="waktuMinggu"  value=""  required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Schedule</label>
                            <div class="col-sm-12">
                                <input type="text" id="jadwal" name="jadwalMinggu" required="" maxlength="40" placeholder="Enter Schedule" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            <button type="submit" class="btn " id="saveBtnEdit" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal senin --}}
    <div class="modal schedule fade" id="ajaxModelSenin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingMonday"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit_senin" name="edit_senin" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Waktu</label>
                            <div class="col-sm-12 w-50">
                                <input type="time" class="form-control" id="waktuSenin" name="waktuSenin"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jadwal</label>
                            <div class="col-sm-12">
                                <input type="text" id="jadwalSenin" name="jadwalSenin" required="" maxlength="40" placeholder="Enter Schedule" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn" id="saveBtnEditSenin" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal selasa --}}
    <div class="modal schedule fade" id="ajaxModelSelasa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingTuesday"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit_selasa" name="edit_selasa" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Waktu</label>
                            <div class="col-sm-12 w-50">
                                <input type="time" class="form-control" id="waktuSelasa" name="waktuSelasa"  value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jadwal</label>
                            <div class="col-sm-12">
                                <input type="text" id="jadwalSelasa" name="jadwalSelasa"  maxlength="40" required="" placeholder="Enter Schedule" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn btn-primary" id="saveBtnEditSelasa" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal rabu --}}
    <div class="modal schedule fade" id="ajaxModelRabu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingWednesday"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit_rabu" name="edit_rabu" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Waktu</label>
                            <div class="col-sm-12 w-50">
                                <input type="time" class="form-control" id="waktuRabu" name="waktuRabu" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jadwal</label>
                            <div class="col-sm-12">
                                <input type="text" id="jadwalRabu" name="jadwalRabu" required="" maxlength="40" placeholder="Enter Schedule" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn btn-primary" id="saveBtnEditRabu" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal kamis --}}
    <div class="modal schedule fade" id="ajaxModelKamis" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingThursday"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit_kamis" name="edit_kamis" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Waktu</label>
                            <div class="col-sm-12 w-50">
                                <input type="time" class="form-control" id="waktuKamis" name="waktuKamis" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jadwal</label>
                            <div class="col-sm-12">
                                <input type="text" id="jadwalKamis" name="jadwalKamis"  maxlength="40" required="" placeholder="Enter Schedule" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn btn-primary" id="saveBtnEditKamis" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal jumat --}}
    <div class="modal schedule fade" id="ajaxModelJumat" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingFriday"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit_jumat" name="edit_jumat" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Waktu</label>
                            <div class="col-sm-12 w-50">
                                <input type="time" class="form-control" id="waktuJumat" name="waktuJumat" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jadwal</label>
                            <div class="col-sm-12">
                                <input type="text" id="jadwalJumat" name="jadwalJumat"  maxlength="40" required="" placeholder="Enter Schedule" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn btn-primary" id="saveBtnEditJumat" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal sabtu --}}
    <div class="modal schedule fade" id="ajaxModelSabtu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingSaturday"></h4>
                </div>
                <div class="modal-body">
                    <form id="edit_sabtu" name="edit_sabtu" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Waktu</label>
                            <div class="col-sm-12 w-50">
                                <input type="time" class="form-control" id="waktuSabtu" name="waktuSabtu" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jadwal</label>
                            <div class="col-sm-12">
                                <input type="text" id="jadwalSabtu" name="jadwalSabtu" maxlength="40" required="" placeholder="Enter Schedule" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn btn-primary" id="saveBtnEditSabtu" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal tugas --}}
    <div class="modal task fade" id="ajaxModelTugas" aria-hidden="true">
        <div class="modal-dialog">
            <div id="response-add-error-modal" class="alert alert-danger alert-dismissible fade show position-relative" role="alert">
                <p id="text-error-modal"  class="text-center"></p>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingTugas"></h4>
                </div>
                <div class="modal-body">
                    <form id="tugasForm" name="tugasForm" class="form-horizontal">
                        <input type="hidden" name="id" id="id_tugas">
                        <div class="form-group">
                            <label for="tugas" class="col-sm-2 control-label">Task</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tugas" name="tugas" placeholder="Enter Task" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-row d-flex w-100">
                            <div class="form-group w-50 me-1">
                                <label class="col-sm-6 control-label">Start Task</label>
                                <input type="datetime-local" id="waktu_awal" name="waktu_awal" required="" placeholder="Enter Start Task" class="form-control">
                            </div>
                            <div class="form-group w-50 ms-1">
                                <label class="col-sm-6 control-label">End Task</label>
                                <input type="datetime-local" id="waktu_akhir" name="waktu_akhir" required="" placeholder="Enter End Task" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="description" name="description" placeholder="Enter Description" maxlength="150" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn btn-primary" id="saveBtnTugas" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- tugas deadline --}}
    <div class="modal task fade" id="ajaxModelTugasDeadline" aria-hidden="true">
        <div class="modal-dialog">
            <div id="response-add-error-modal-deadline" class="alert alert-danger alert-dismissible fade show position-relative" role="alert">
                <p id="text-error-modal-deadline"  class="text-center">PPPPP</p>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingTugasDeadline"></h4>
                </div>
                <div class="modal-body">
                    <form id="tugasDeadlineForm" name="tugasDeadlineForm" class="form-horizontal">
                        <input type="hidden" name="id" id="id_tugasDeadline">
                        <div class="form-group">
                            <label for="tugas" class="col-sm-2 control-label">Task</label>
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" id="tugasDeadline" name="tugas" placeholder="Enter Task" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-row d-flex w-100">
                            <div class="form-group w-50 me-1">
                                <label class="col-sm-6 control-label">Start Task</label>
                                <input type="datetime-local" id="waktu_awalDeadline" name="waktu_awal" required="" placeholder="Enter Start Task" class="form-control">
                            </div>
                            <div class="form-group w-50 ms-1">
                                <label class="col-sm-6 control-label">End Task</label>
                                <input type="datetime-local" id="waktu_akhirDeadline" name="waktu_akhir" required="" placeholder="Enter End Task" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" id="descriptionDeadline" name="description" placeholder="Enter Description" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn btn-primary" id="saveBtnTugasDeadline" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal tugas done --}}
    <div class="modal task fade" id="ajaxModelTugasDone" aria-hidden="true">
        <div class="modal-dialog">
            <div id="response-add-error-modal-done" class="alert alert-danger alert-dismissible fade show position-relative" role="alert">
                <p id="text-error-modal-done"  class="text-center">PPPPP</p>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeadingTugasDone"></h4>
                </div>
                <div class="modal-body">
                    <form id="tugasDoneForm" name="tugasDoneForm" class="form-horizontal">
                        <input type="hidden" name="id" id="id_tugasDone">
                        <div class="form-group">
                            <label for="tugas" class="col-sm-2 control-label">Task</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tugasDone" name="tugas" placeholder="Enter Task" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-row d-flex w-100">
                            <div class="form-group w-50 me-1">
                                <label class="col-sm-6 control-label">Start Task</label>
                                <input type="datetime-local" id="waktu_awalDone" name="waktu_awal" required="" placeholder="Enter Start Task" class="form-control">
                            </div>
                            <div class="form-group w-50 ms-1">
                                <label class="col-sm-6 control-label">End Task</label>
                                <input type="datetime-local" id="waktu_akhirDone" name="waktu_akhir" required="" placeholder="Enter End Task" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="descriptionDone" name="description" placeholder="Enter Description" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10 mt-3">
                            {{-- <button type="submit" class="btn btn-primary" id="saveBtnEdit" value="create">Save changes --}}
                            <button type="submit" class="btn" id="saveBtnTugasDone" value="create">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="../js/tugasControll.js"></script>
    <script type="text/javascript" src="js/jadwal.js"></script>
    <script src="js/script.js"></script>
    <script src="js/tambahRowMinggu.js"></script>
    <script src="../js/hapusRowMinggu.js"></script>
    <script src="../js/hapusRowSenin.js"></script>
    <script src="../js/tambahRowSenin.js"></script>
    <script src="../js/hapusRowSelasa.js"></script>
    <script src="../js/tambahRowSelasa.js"></script>
    <script src="../js/hapusRowRabu.js"></script>
    <script src="../js/tambahRowRabu.js"></script>
    <script src="../js/hapusRowKamis.js"></script>
    <script src="../js/tambahRowKamis.js"></script>
    <script src="../js/hapusRowJumat.js"></script>
    <script src="../js/tambahRowJumat.js"></script>
    <script src="../js/hapusRowSabtu.js"></script>
    <script src="../js/tambahRowSabtu.js"></script>
    <script src="../js/responsive.js"></script>
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }

        // Kode untuk ucapan
        {
            const time = new Date().getHours();
            let greeting;
            if (time < 10) {
                greeting = "Good Morning";
            } else if (time < 20) {
                greeting = "Good Afternoon";
            } else {
                greeting = "Good Evening";
            }
            document.getElementById("sambutan").innerHTML = greeting + " {{auth()->user()->name}}";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.2/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/date-1.4.0/datatables.min.js"></script>
    {{-- <script src="https://cdn.staticaly.com/gh/DungGramer/disable-devtool/cbf447f/disable-devtool.min.js" defer></script> --}}
</body>
</html>
