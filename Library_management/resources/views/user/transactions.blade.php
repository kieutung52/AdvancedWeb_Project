@extends('user.layouts.app')

@section('content')
    <div class="mb-12">
        <h1 class="text-3xl font-bold mb-2">Your Transactions</h1>
        <p class="text-muted-foreground">
            View and manage your borrowing history
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-card border border-border rounded-xl p-6 animate-fade-in">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Total Transactions</p>
                    <h3 class="text-3xl font-bold mt-1">{{ $transactions->count() }}</h3>
                </div>
                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-range text-primary"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                </div>
            </div>
        </div>

        <div class="bg-card border border-border rounded-xl p-6 animate-fade-in" style="animation-delay: 100ms;">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Currently Borrowed</p>
                    <h3 class="text-3xl font-bold mt-1">{{ $borrowedCount }}</h3>
                </div>
                <div class="w-12 h-12 bg-amber-50 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock text-amber-600"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
            </div>
        </div>

        <div class="bg-card border border-border rounded-xl p-6 animate-fade-in" style="animation-delay: 200ms;">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Returned Books</p>
                    <h3 class="text-3xl font-bold mt-1">{{ $returnedCount }}</h3>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle text-green-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-card border border-border rounded-xl overflow-hidden">
        <div class="p-6 border-b border-border">
            <h2 class="text-xl font-medium">Transaction History</h2>
        </div>
        <div class="divide-y divide-border">
            @if ($transactions->isEmpty())
                <div class="py-12 text-center">
                    <p class="text-muted-foreground">No transactions found</p>
                </div>
            @else
                @foreach ($transactions as $index => $transaction)
                    <div class="p-4 flex items-center gap-4 animate-fade-in" style="animation-delay: {{ $index * 100 }}ms;">
                        @if ($transaction->book->cover_image)
                            <div class="w-12 h-16 flex-shrink-0 rounded overflow-hidden">
                                <img src="{{ $transaction->book->cover_image }}" alt="{{ $transaction->book->title }} cover" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <h4 class="text-base font-medium truncate">{{ $transaction->book->title }}</h4>
                            <div class="flex flex-wrap gap-x-6 gap-y-1 mt-1 text-sm text-muted-foreground">
                                <p>Borrowed: {{ $transaction->created_at->format('M d, Y') }}</p>
                                @if ($transaction->returned)
                                    <p>Returned: {{ $transaction->updated_at->format('M d, Y') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="px-3 py-1 rounded-full text-sm font-medium flex items-center gap-1.5 {{ $transaction->returned ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800' }}">
                            @if ($transaction->returned)
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                <span>Returned</span>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <span>Borrowed</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection