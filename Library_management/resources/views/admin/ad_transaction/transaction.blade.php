@extends('admin.dashboard') <!-- Kế thừa giao diện dashboard -->

@section('content')
    <div class="full-width-div">
        <h1>Transactions</h1>
    </div>

    <table id="admin--transaction" class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Username</th>
                <th class="px-4 py-2 border-b">Book Title</th>
                <th class="px-4 py-2 border-b">Due Date</th>
                <th class="px-4 py-2 border-b">Status</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $transaction->username }}</td>
                    <td class="px-4 py-2 border-b">{{ $transaction->book_title }}</td>
                    <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($transaction->due_date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 border-b">
                        <span class="
                            @if ($transaction->status == 'In period') bg-green-500 
                            @elseif ($transaction->status == 'Overdue') bg-red-500 
                            @elseif ($transaction->status == 'Returned') bg-blue-500
                            @else bg-yellow-500
                            @endif 
                            text-white px-2 py-1 rounded-full">
                            {{ $transaction->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border-b text-center">
                        @if ($transaction->returned) <!-- Kiểm tra nếu giao dịch đã trả sách -->
                            <span class="text-blue-600">Completed</span>
                        @else
                            <a href="{{ route('ad_transaction.edit', $transaction->id) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fa-regular fa-pen-to-square"></i> transaction details
                            </a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-2">No transactions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
