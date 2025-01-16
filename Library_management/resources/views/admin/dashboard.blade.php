<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    @vite('resources/css/app.css')
    @vite('resources/css/admin/dashboard.css')
    @vite('resources/css/admin/display.css')
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="navigation">
        <a href="#" id="nav-logo">Kayti</a>
        <div class="nav-links">
            <a href="/home"><span id="nav-items"><i class="fa-solid fa-house"></i> Home</span></a>
            <a href="/users"><span id="nav-items"><i class="fa-solid fa-users"></i> Users</span></a>
            <a href="/books"><span id="nav-items"><i class="fa-solid fa-book"></i> Books</span></a>
            <a href="/transactions"><span id="nav-items"><i class="fa-regular fa-folder-open"></i> Transactions</span></a>
        </div>
        <!-- Logout Form at the bottom -->
        <form action="/logout" method="post">
            @csrf
            <button class="logout-button"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
        </form>
    </div>
    
    <div id="main">
        @yield('content')
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alerts = document.querySelectorAll('.alert');
            console.log(alerts);
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 3000);
            });
        });
    </script>
</body>
</html>