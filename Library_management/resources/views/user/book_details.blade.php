@extends('user.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/3">
                <img src="https://placehold.co/600x400/png" alt="{{ $book->title }} cover" class="w-full rounded-lg">
            </div>
            <div class="md:w-2/3">
                <p class="text-gray-600 mb-2"><strong>Author:</strong> {{ $book->author }}</p>
                <p class="text-gray-600 mb-2"><strong>Genre:</strong> {{ $book->genre }}</p>
                <p class="text-gray-600 mb-2"><strong>Language:</strong> {{ $book->language }}</p>
                <p class="text-gray-600 mb-4"><strong>Status:</strong> {{ $book->status }}</p>
                <p class="text-gray-700">{{ $book->description }}</p>
                <div class="mt-6">
                    <form action="{{ route('request.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Borrow</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection