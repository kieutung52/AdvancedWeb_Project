<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kayti Library</title>

    @vite('resources/css/app.css')
    @vite('resources/css/admin/dashboard.css')
    @vite('resources/css/admin/display.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="flex flex-col h-screen bg-gray-100">

    <nav class="bg-blue-500 text-white p-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold flex items-center">
            <i class="fa-solid fa-book-open mr-2"></i> Kayti Library
        </a>
        <div class="flex items-center space-x-4">
            <a href="{{ route('home') }}" class="hover:bg-blue-700 px-3 py-2 rounded transition flex items-center">
                <i class="fa-solid fa-house mr-1"></i> Home
            </a>
            <a href="{{ route('bookshelf') }}" class="hover:bg-blue-700 px-3 py-2 rounded transition flex items-center">
                <i class="fa-solid fa-book mr-1"></i> Bookshelf
            </a>
            <a href="{{ route('transactions') }}" class="hover:bg-blue-700 px-3 py-2 rounded transition flex items-center">
                <i class="fa-regular fa-folder-open mr-1"></i> Transactions
            </a>
            <form action="{{ route('logout') }}" method="post" class="inline-block">
                @csrf
                <button type="submit" class="hover:bg-red-600 p-2 rounded transition">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </nav>

    <div class="flex-grow p-6">
        @if (session('success'))
            <div class="fixed bottom-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg fade-out">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="fixed bottom-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg fade-out">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="fixed bottom-5 right-5 bg-yellow-500 text-white p-4 rounded-lg shadow-lg fade-out">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.querySelectorAll('.fade-out').forEach(alert => {
                    alert.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                    setTimeout(() => alert.remove(), 500);
                });
            }, 3000);
        });
    </script>

</body>
</html>