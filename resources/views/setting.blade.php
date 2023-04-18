<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Belky Planner for management task and schedule">
    <meta name="keywords" content="Belky Planner, Planner, Schedule, Management">
    <meta name="author" content="Mahardika Surya Kusuma">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://kit.fontawesome.com/b0cef64d70.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="jQuery-3.6.0/jquery-3.6.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/asset/gambarIcon/logoBelky.ico">
    <link rel="stylesheet" href="style/styleSetting.css">
    <link rel="stylesheet" href="style/settingResponsive.css">
    <title>Setting</title>
</head>
<body>
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('status-error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('status-error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @error('password')
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    <section id="content" class="content">
        <div class="cover-nav-side">
            <div class="navigation-side">
                <ul class="nav-list">
                    <li>
                        <a >
                            <span id="side-activator" class="icon-top"><i class="fa-solid fa-bars"></i></span>
                            <span class="tittle">
                                <h2>Belky Planner</h2>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('dashboard') }}" class="homeContent">
                            <span class="icon"><i class='bx bxs-home'></i></span>
                            <span class="tittle">Home</span>
                        </a>
                    </li>
                    <li class="active">
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
            </div>
        </div>
        <div class="container-setting">
                <div class="cover-ganti-password">
                    <div class="bx-password">
                        <div class="bx-head">Change Password</div>
                        <form action="{{ url('update-password') }}" method="POST">
                            @csrf
                            <div class="bx-body">
                                <div class="mb-3 bx-input">
                                    <label for="oldPasswordInput" class="form-label">Old Password</label>
                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                        placeholder="Old Password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3  bx-input">
                                    <label for="newPasswordInput" class="form-label">New Password</label>
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                        placeholder="New Password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3  bx-input">
                                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                        placeholder="Confirm New Password">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Save Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="cover-ganti-nama">
                    <div class="bx-nama">
                        <div class="bx-head">Change Name</div>
                        <form action="{{ url('update-name') }}" method="POST">
                            @csrf
                            <div class="bx-body">
                                <div class="mb-3 bx-input">
                                    <label for="changeName" class="form-label">New Name</label>
                                    <input name="new_name" type="text" class="form-control @error('new_name') is-invalid @enderror" id="changeName"
                                        placeholder="Insert New Name">
                                    @error('new_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Save Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="cover-hapus-akun">
                    <div class="card">
                        <div class="card-header text-center">Delete Account</div>
                            <div class="card-footer text-center">
                                <button class="btn btn-danger w-75 " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Delete</button>
                            </div>
                    </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('delete') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="recipient-name">
                        </div>
                        <div class="modal-footer">
                            <button  class="btn btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/setting.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
