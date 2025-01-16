<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
    @vite('resources/css/app.css');
    @vite('resources/css/login/login.css');
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Kayti Library</h1>
            <h3>Login</h3>
            <form action="/login" method="post">
                @csrf
                <div class="input-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" placeholder="Enter your username">
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                </div>
                
                <input type="submit" value="Login">
                <h4>OR LOGIN WITH GOOGLE</h4>
                <a href="/login/google"><button type="button" class="logwithgg"><i class="fa-brands fa-google"></i><span> Log In with Google</span></button></a>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="/register">Register here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
