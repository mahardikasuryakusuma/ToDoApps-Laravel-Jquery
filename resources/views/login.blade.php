<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Belky Planner for management task and schedule">
    <meta name="keywords" content="Belky Planner, Planner, Schedule, Management">
    <meta name="author" content="Mahardika Surya Kusuma">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/asset/gambarIcon/logoBelky.ico">
    <link rel="stylesheet" href="style/style.css">
    <title>Belky Planner</title>
</head>
<body>
    <section>
        @if(session('status'))
            <div class="alert alert-warning alert-dismissible fade show  text-center" role="alert">
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
            <div class="login">
                <h1>Hello, Login Here</h1>
                <form action="authenticate" method="POST">
                    @csrf
                    <div class="user-box">
                        <input type="text" name="username" id="username"  required="">
                        <label for="username">Username</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" id="password"  required="">
                        <label for="password">Password</label>
                    </div>
                    <div class="user">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="btn">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
                <p>Don't have an acount yet? <br> <a href="{{ url('register') }}" class="balik">Sign Up</a></p>
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
