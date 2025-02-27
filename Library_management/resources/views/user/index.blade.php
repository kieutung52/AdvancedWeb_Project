@extends('user.layouts.app')

@section('content')
    <section class="py-16 md:py-24 text-center max-w-4xl mx-auto">
        <div class="space-y-6">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-secondary text-secondary-foreground mb-4 animate-on-scroll visible">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open mr-2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                <span class="text-sm font-medium">Your Digital Library</span>
            </div>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold animate-on-scroll visible delay-1">
                Welcome to <span class="text-primary">Book Harbor</span>
            </h1>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto animate-on-scroll visible delay-2">
                Dive into a sea of knowledge and imagination. Browse our vast collection of books,
                manage your readings, and explore new literary adventures.
            </p>
        </div>
    </section>

    <section class="py-16 max-w-6xl mx-auto">
        <div class="text-center mb-12 animate-on-scroll">
            <h2 class="text-3xl font-bold">Inspiring Quotes</h2>
            <p class="text-muted-foreground mt-2">
                Words of wisdom from literary classics
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($quotes as $index => $quote)
                <div class="relative p-6 rounded-xl border border-border bg-card overflow-hidden transition-all duration-300 hover:shadow-md animate-on-scroll delay-{{ ($index % 5) + 1 }}">
                    <div class="absolute -top-2 -left-2 text-muted-foreground/10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote"><path d="M3 21c3.333-2 5-6 5-10a5 5 0 0 0-5-5 5 5 0 0 0-5 5c0 4 1.667 8 5 10z"></path><path d="M15 21c3.333-2 5-6 5-10a5 5 0 0 0-5-5 5 5 0 0 0-5 5c0 4 1.667 8 5 10z"></path></svg>
                    </div>
                    <blockquote class="relative z-10">
                        <p class="text-lg font-serif italic leading-relaxed">
                            "{{ $quote->quote }}"
                        </p>
                        <footer class="mt-4 text-right">
                            <p class="text-sm font-medium text-foreground">{{ $quote->author }}</p>
                            <p class="text-xs text-muted-foreground">{{ $quote->book }}</p>
                        </footer>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-16 text-center max-w-2xl mx-auto animate-on-scroll">
        <div class="bg-secondary/50 backdrop-blur-sm border border-border p-8 rounded-2xl">
            <h2 class="text-2xl font-bold mb-4">Ready to Explore?</h2>
            <p class="text-muted-foreground mb-6">
                Browse our collection and find your next favorite book.
            </p>
            <a href="{{ route('bookshelf') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-primary text-primary-foreground hover:bg-primary/90 transition-colors">
                Explore Bookshelf
            </a>
        </div>
    </section>
@endsection