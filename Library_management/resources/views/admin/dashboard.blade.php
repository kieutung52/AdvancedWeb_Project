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
    <style>
        /* Custom Styles */
        .bg-sidebar {
            background-color: #3d68ff; /* Updated color */
        }

        .text-sidebar-foreground {
            color: #ffffff; /* White text */
        }

        .hover\:bg-blue-700:hover {
             background-color: #365fd9;
        }
        .main-content {
            margin-left: 256px; /* Match sidebar width (w-64 = 256px) */
            transition: margin-left 0.3s ease; /* Smooth transition */
        }

        /* Optional: Handle smaller screens */
        @media (max-width: 768px) { /* Adjust breakpoint as needed */
            .main-content {
                margin-left: 0;
            }
           .bg-sidebar{
            display:none;
           }
        }
    </style>
     <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="flex h-screen bg-gray-100">

    <aside class="w-64 bg-sidebar fixed h-full border-r border-gray-800 z-30">
        <div class="flex items-center justify-center h-16 px-6 border-b border-gray-800">
            <h1 class="text-xl font-serif font-semibold text-sidebar-foreground">
                Kayti Library
            </h1>
        </div>

        <nav class="flex-1 py-8 px-4 space-y-6">
            <div class="space-y-1">
                <a href="/dashboard" class="relative flex items-center w-full gap-3 px-3 py-2 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
                <a href="/borrowed_request" class="relative flex items-center w-full gap-3 px-3 py-2 text-white/80 hover:text-white hover:bg-blue-700 transition-colors duration-200 rounded-md">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="fa-solid fa-inbox"></i>
                    </span>
                    <span>Borrow Request</span>
                </a>
                <a href="/users" class="relative flex items-center w-full gap-3 px-3 py-2 text-white/80 hover:text-white hover:bg-blue-700 transition-colors duration-200 rounded-md">
                    <span class="w-5 h-5 flex items-center justify-center">
                       <i class="fa-solid fa-users"></i>
                    </span>
                    <span>Users</span>
                </a>
                <a href="/books" class="relative flex items-center w-full gap-3 px-3 py-2 text-white/80 hover:text-white hover:bg-blue-700 transition-colors duration-200 rounded-md">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="fa-solid fa-book"></i>
                    </span>
                    <span>Books</span>
                </a>
                <a href="/transactions" class="relative flex items-center w-full gap-3 px-3 py-2 text-white/80 hover:text-white hover:bg-blue-700 transition-colors duration-200 rounded-md">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="fa-regular fa-folder-open"></i>
                    </span>
                    <span>Transactions</span>
                </a>
            </div>
        </nav>

        <div class="absolute bottom-0 w-full py-4 px-6 border-t border-gray-800">
            <form action="/logout" method="post">
                @csrf
                <button class="flex items-center justify-center w-full gap-2 p-2 mt-2 rounded-md text-white/90 hover:text-white hover:bg-blue-700/10 transition-colors text-sm">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
            <p class="text-xs text-white/60 text-center mt-4">
                © 2024 Kayti Library
            </p>
        </div>
    </aside>

    <div class="flex-grow p-6 main-content">  @if (session('success'))
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