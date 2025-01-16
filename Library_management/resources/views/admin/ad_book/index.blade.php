@extends('admin.dashboard') <!-- Kế thừa giao diện dashboard -->

@section('content')
    <div class="full-width-div">
        <h1>Books</h1>
    </div>

    <table id="admin--book">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Language</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->language }}</td>
                    <td>
                        <span class="status-{{ strtolower($book->status) }}">
                            {{ $book->status }}
                        </span>
                    </td>
                    <td class="actions">
                        <a href="{{ route('ad_book.edit', $book->id) }}">
                            <i class="fa-regular fa-pen-to-square"></i> Edit
                        </a>
                        <form action="{{ route('ad_book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{route('ad_book.create')}}">
        <div class="admin_create">
            <i class="fa-solid fa-plus"></i>Add Book
        </div>
    </a>
@endsection
