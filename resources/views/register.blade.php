<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Belky Planner for management task and schedule">
    <meta name="keywords" content="Belky Planner, Planner, Schedule, Management">
    <meta name="author" content="Mahardika Surya Kusuma">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/asset/gambarIcon/logoBelky.ico">
    <link rel="stylesheet" href="style/style.css">
    <title>Belky Planner</title>
</head>
<body>
    <section>
        <div class="register">
            <h1>Sign Up</h1>
            <form action="registrasi" method="POST">
                @csrf
                <div class="user-box">
                    <input
                        class="@error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        type="text"
                        name="name"
                        id="name"
                        required="" >
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="user-box">
                    <input
                        class="@error('username') is-invalid @enderror"
                        value="{{ old('username') }}"
                        type="text"
                        name="username"
                        id="username"
                        required="" >
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- <div class="user-box">
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required="" >
                    <label for="email">E-Mail</label>
                </div> --}}
                <div class="user-box">
                    <input
                        class="@error('password') is-invalid @enderror"
                        type="password"
                        name="password"
                        id="password"
                        required="">
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="user-box">
                    <input
                        class="@error('password_confirm') is-invalid @enderror"
                        type="password"
                        name="password_confirm"
                        id="password_confirm"
                        required="">
                    <label for="password_confirm">Confirm Password</label>
                    @error('password_confirm')
                        <div class="invalid-feedback">
                                {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="btn">
                    <button type="submit" name="register">Create Account</button>
                </div>
            </form>
            <p>Doesn't have account? <a href="{{ url('/') }}" class="baliik">Login Here</a></p>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
