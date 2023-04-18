<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Belky Planner for management task and schedule">
    <meta name="keywords" content="Belky Planner, Planner, Schedule, Management">
    <meta name="author" content="Mahardika Surya Kusuma">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/b0cef64d70.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/asset/gambarIcon/logoBelky.ico">
    <link rel="stylesheet" href="/style/about.css">
    <link rel="stylesheet" href="/style/aboutResponsive.css">
    <title>About</title>
</head>
<body>
    <section id="content" class="content">
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
                    <li id="scheduleRes" class="list">
                        <a href="{{ url('dashboard') }}" class="homeContent">
                            <span class="icon"><i class='bx bxs-home'></i></span>
                            <span class="tittle">Home</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ url('setting') }}">
                            <span class="icon"><i class="fa-solid fa-gear"></i></span>
                            <span class="tittle">Setting</span>
                        </a>
                    </li>
                    <li class="list active">
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
        <div class="cover-about">
            <div class="first-about">
                <div class="cover-greet">
                    <h3>Hello!!👋 This Is</h3>
                    <h1>Belky Planner</h1>
                    <div class="cover-ucapan">
                            <p>Belky Planner was created based on the creator's concern as they are forgetful of schedules and tasks. Therefore, the creator attempted to create a schedule that can be viewed anywhere and anytime. Thus, the Belky Planner website was born. Although there are still many shortcomings, the creator will strive to make improvements. <br>
                            So, enjoy using this website</p>
                    </div>
                </div>
                <div class="cover-sosmed">
                    <p>Follow the creator's social media account at</p>
                    <div class="cover-logo-sosmed">
                        <div class="container-logsos">
                            <a href="https://www.instagram.com/hallodiik/">
                                <img src="/asset/gambarIcon/instagram.svg" alt="Instagram">
                            </a>
                        </div>
                        <div class="container-logsos">
                            <a href="https://github.com/mahardikasuryakusuma">
                                <img src="/asset/gambarIcon/github.svg" alt="Github">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tech">
                <div class="cover-judul-tech">
                    <h1>This website was created using</h1>
                </div>
                <div class="container">
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/html.svg" alt="html">
                        </div>
                        <span>HTML</span>
                    </div>
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/php-icon.svg" alt="html">
                        </div>
                        <span>PHP</span>
                    </div>
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/js.svg" alt="html">
                        </div>
                        <span>Javascript</span>
                    </div>
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/css.svg" alt="html">
                        </div>
                        <span>CSS</span>
                    </div>
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/laravel.svg" alt="html">
                        </div>
                        <span>Laravel</span>
                    </div>
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/git.svg" alt="html">
                        </div>
                        <span>GIT</span>
                    </div>
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/bootstrap.svg" alt="html">
                        </div>
                        <span>Bootstrap</span>
                    </div>
                    <div class="container-bx">
                        <div class="imgBx">
                            <img src="/asset/gambarIcon/jquery-icon.svg" alt="html">
                        </div>
                        <span>Jquery</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/setting.js"></script>
</body>
</html>
