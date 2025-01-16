@extends('admin.dashboard')

@section('content')

<form action="{{ route('ad_book.update', $book->id) }}" method="POST" class="admin_create-form p-8 bg-white shadow-md rounded" id="edit-book-form">
    @csrf
    @method('PUT')
    <h3 class="text-lg font-bold mb-4">Edit Book</h3>
    
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" id="title" name="title" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('title', $book->title) }}">
    </div>

    <div class="mb-4">
        <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
        <input type="text" id="author" name="author" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('author', $book->author) }}">
    </div>

    <div class="mb-4">
        <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
        <input type="text" id="genre" name="genre" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('genre', $book->genre) }}">
    </div>

    <div class="mb-4">
        <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
        <input type="text" id="language" name="language" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('language', $book->language) }}">
    </div>

    <div class="mb-4">
        <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
        <input type="date" id="published_date" name="published_date" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('published_date', $book->published_date) }}">
    </div>

    <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" id="status" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="Active" {{ old('status', $book->status) == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ old('status', $book->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Update Book
    </button>
</form>

@endsection
