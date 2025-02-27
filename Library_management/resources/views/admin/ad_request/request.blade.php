@extends('admin.dashboard')

@section('content')
    <div class="full-width-div">
        <h1>Book Requests</h1>
    </div>

    <table id="admin--book-requests" class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Username</th>
                <th class="px-4 py-2 border-b">Book Title</th>
                <th class="px-4 py-2 border-b">Request Date</th>
                <th class="px-4 py-2 border-b">Due Date</th>
                <th class="px-4 py-2 border-b">Status</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookRequests as $bookRequest)
                <tr id="request-row-{{ $bookRequest->id }}">
                    <td class="px-4 py-2 border-b">{{ $bookRequest->username }}</td>
                    <td class="px-4 py-2 border-b">{{ $bookRequest->book_title }}</td>
                    <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($bookRequest->request_date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($bookRequest->due_date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 border-b" id="status-{{ $bookRequest->id }}">
                        <span class="
                            @if ($bookRequest->status == 'Pending') bg-yellow-500 
                            @elseif ($bookRequest->status == 'Accepted') bg-green-500 
                            @elseif ($bookRequest->status == 'Cancelled') bg-red-500
                            @endif 
                            text-white px-2 py-1 rounded-full">
                            {{ $bookRequest->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border-b text-center">
                        <a href="{{ route('ad_request.details', $bookRequest->id) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="fa-regular fa-eye"></i> Request Details
                        </a>
                        @if ($bookRequest->status == 'Pending')
                            <form action="{{ route('ad_request.cancel', $bookRequest->id) }}" method="post" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-4">
                                    <i class="fa-solid fa-x"></i> 
                                </button>
                            </form>
                            <form action="{{ route('ad_request.accept', $bookRequest->id) }}" method="post" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-green-500 hover:text-green-700 ml-4">
                                    <i class="fa-solid fa-check"></i> 
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-2">No book requests found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
