<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\BookRequest;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class BookRequestController extends Controller
{
    //
    public function index()
    {
        $bookRequests = BookRequest::all();
        return view('admin.ad_request.request', compact('bookRequests'));
    }

    public function accept($id)
    {
        $bookRequest = BookRequest::findOrFail($id);
        $bookRequest->status = 'Accepted';
        $bookRequest->save();

        Transaction::create([
            'user_id' => $bookRequest->user_id,
            'book_id' => $bookRequest->book_id,
            'username' => $bookRequest->username,
            'book_title' => $bookRequest->book_title,
            'due_date' => $bookRequest->due_date,
            'status' => 'In period',
            'returned' => false,
        ]);
        return redirect()->back()->with('success', 'Book request accepted.');
    }

    public function cancel($id)
    {
        $bookRequest = BookRequest::findOrFail($id);
        $bookRequest->status = 'Cancelled';
        $bookRequest->save();

        return redirect()->back()->with('success', 'Book request cancelled.');
    }

    public function edit($id)
    {
        $bookRequest = BookRequest::findOrFail($id);
        $user = User::findOrFail($bookRequest->user_id);
        $book = Book::findOrFail($bookRequest->book_id);
        return view('admin.ad_request.details', compact('bookRequest', 'user', 'book'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $bookId = $request->input('book_id');

        $book = Book::findOrFail($bookId);

        BookRequest::create([
            'user_id' => $user->id,
            'book_id' => $bookId,
            'username' => $user->name, 
            'book_title' => $book->title,
            'request_date' => now(),
            'due_date' => now()->addDays(7), 
            'status' => 'Pending',
        ]);
       
        return redirect()->back()->with('success', 'Book request submitted successfully!');
    }
}
