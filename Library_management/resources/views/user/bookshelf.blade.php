@extends('user.layouts.app')

@section('content')
    <div class="mb-12">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold mb-2">Bookshelf</h1>
                <p class="text-muted-foreground">
                    Browse our collection of {{ $books->count() }} books
                </p>
            </div>
            <div class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search text-muted-foreground"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <input 
                    type="text" 
                    placeholder="Search books..." 
                    class="w-full pl-10 pr-4 py-2 border border-input rounded-md bg-background"
                    onkeyup="searchBooks(this.value)"
                />
            </div>
        </div>
        <div id="books-grid" class="space-y-8">
            @foreach ($books as $index => $book)
                <div class="transform transition-all duration-300 animate-on-scroll delay-{{ ($index % 5) + 1 }}">
                    <div class="flex w-full h-[400px] rounded-xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-lg border border-border bg-card text-card-foreground">
                        <div class="relative w-[300px] h-full flex-shrink-0 overflow-hidden bg-muted">
                            <img src="https://placehold.co/600x400/png" alt="{{ $book->title }} cover" class="w-full h-full object-cover transition-transform duration-500" loading="lazy">
                        </div>
                        <div class="flex flex-col justify-between flex-1 p-6">
                            <div class="space-y-3">
                                <div class="space-y-1">
                                    <h3 class="text-2xl font-semibold leading-tight line-clamp-2">{{ $book->title }}</h3>
                                    <p class="text-muted-foreground">by {{ $book->author }}</p>
                                </div>
                                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary text-secondary-foreground w-fit">
                                    {{ $book->language }}
                                </div>
                                <p class="text-sm text-muted-foreground line-clamp-3 mt-4">
                                    {{ $book->description }}
                                </p>
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('book.details', $book->id) }}" class="inline-flex items-center justify-center gap-1 px-4 py-2 rounded-md text-sm font-medium bg-primary text-primary-foreground hover:bg-primary/90 transition-colors">
                                    Book Details
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function searchBooks(query) {
            // Thực hiện logic tìm kiếm ở đây (ví dụ: gửi yêu cầu AJAX đến server)
            // và cập nhật nội dung của #books-grid
            console.log("Searching for:", query);
        }
    </script>
@endsection