@extends('admin.dashboard')

@section('content')
    <div class="full-width-div">
        <h1>Transaction Details</h1>
    </div>

    <form method="POST" action="{{ route('ad_transaction.update', $transaction->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" value="{{ $transaction->username }}" disabled class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Book Title</label>
            <input type="text" value="{{ $transaction->book_title }}" disabled class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Due Date</label>
            <input type="text" value="{{ \Carbon\Carbon::parse($transaction->due_date)->format('d/m/Y') }}" disabled class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>

        @if (!$transaction->returned)
            <div class="mb-4">
                <button type="submit" name="action" value="complete" class="bg-blue-500 text-white px-4 py-2 rounded-md">Complete</button>
                <a href="{{ route('ad_transaction.transactions') }}" class="bg-red-500 text-white px-4 py-2 rounded-md">Cancel</a>
            </div>
        @else
            <p class="text-green-500">This transaction is already completed.</p>
        @endif
    </form>
@endsection
