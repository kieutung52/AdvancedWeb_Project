<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    @vite('resources/css/app.css')
    @vite('resources/css/login/login.css') <!-- Sử dụng lại CSS của trang đăng nhập -->
</head>
<body>
    <div class="login-container">
        <div class="login-box register">
            <h1>Kayti Library</h1>
            <h3>Register</h3>
            <form action="/register" method="post">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter your username" id="username" name="name">
                </div>
                
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Enter your email" id="email" name="email">
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter your password" id="password" name="password">
                </div>
                
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" placeholder="Confirm your password" id="password_confirmation" name="password_confirmation">
                </div>
                
                <input type="submit" value="Register">
            </form>
            <div class="register-link">
                <p>Already have an account? <a href="/login">Log in</a></p>
            </div>
        </div>
    </div>
</body>
</html>
