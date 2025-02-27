<button 
    onclick="toggleSidebar()"
    class="fixed z-50 top-4 left-4 p-2 rounded-full bg-primary text-primary-foreground lg:hidden" 
    aria-label="Open menu"
>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
</button>

<aside id="sidebar" class="fixed z-40 h-full bg-sidebar w-64 transition-all duration-300 ease-in-out border-r border-sidebar-border -left-64 lg:left-0">
    <div class="flex flex-col h-full">
        <div class="flex items-center justify-center h-16 px-6 border-b border-sidebar-border">
            <h1 class="text-xl font-serif font-semibold text-sidebar-foreground">
                Book Harbor
            </h1>
        </div>
        <nav class="flex-1 py-8 px-4 space-y-6">
            <div class="space-y-1">
                <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </span>
                    <span>Home</span>
                </a>
                <a href="{{ route('bookshelf') }}" class="nav-item {{ request()->routeIs('bookshelf') ? 'active' : '' }}">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                    </span>
                    <span>Bookshelf</span>
                </a>
                <a href="{{ route('transactions') }}" class="nav-item {{ request()->routeIs('transactions') ? 'active' : '' }}">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </span>
                    <span>Transactions</span>
                </a>
            </div>
        </nav>
        <div class="py-4 px-6 border-t border-sidebar-border">
            <p class="text-xs text-sidebar-foreground/60 text-center">
                © 2024 Book Harbor
            </p>
        </div>
    </div>
</aside>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-left-64');
        sidebar.classList.toggle('left-0');
    }
</script>