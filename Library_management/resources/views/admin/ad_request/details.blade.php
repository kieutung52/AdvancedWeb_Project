@extends('admin.dashboard')

@section('content')
    <!-- Nút Back nằm trên cùng -->
    <div class="mb-4">
        <a href="{{ route('ad_request.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            <i class="fa-solid fa-caret-left"></i> Back to Borrowed Requests
        </a>
    </div>

    <h1 class="text-2xl font-bold mb-4">Book Request Details</h1>

    <!-- Thông tin người dùng -->
    <div class="bg-white shadow-md rounded p-6 mb-4">
        <h2 class="text-xl font-semibold">User Information</h2>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ $user->role }}</p>
    </div>

    <!-- Thông tin sách -->
    <div class="bg-white shadow-md rounded p-6 mb-4">
        <h2 class="text-xl font-semibold">Book Information</h2>
        <p><strong>Title:</strong> {{ $book->title }}</p>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Genre:</strong> {{ $book->genre }}</p>
        <p><strong>Language:</strong> {{ $book->language }}</p>
    </div>

    <!-- Thông tin yêu cầu -->
    <div class="bg-white shadow-md rounded p-6">
        <h2 class="text-xl font-semibold">Request Information</h2>
        <p><strong>Request Date:</strong> {{ \Carbon\Carbon::parse($bookRequest->request_date)->format('d/m/Y') }}</p>
        <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($bookRequest->due_date)->format('d/m/Y') }}</p>
        <p><strong>Status:</strong> 
            <span class="px-2 py-1 rounded-full 
                @if ($bookRequest->status == 'Pending') bg-yellow-500 
                @elseif ($bookRequest->status == 'Accepted') bg-green-500 
                @elseif ($bookRequest->status == 'Cancelled') bg-red-500 
                @endif text-white">
                {{ $bookRequest->status }}
            </span>
        </p>
    </div>

    <!-- Nút Accept & Cancel -->
    @if ($bookRequest->status == 'Pending')
        <div class="mt-4 flex space-x-4">
            <form action="{{ route('ad_request.accept', $bookRequest->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    <i class="fa-solid fa-check"></i> Accept
                </button>
            </form>

            <form action="{{ route('ad_request.cancel', $bookRequest->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </button>
            </form>
        </div>
    @endif
@endsection
