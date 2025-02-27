<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();

        return view('admin.ad_book.index', compact('books'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('ad_book.index')->with('success', 'Book deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'language' => 'required|string|max:255', 
            'status' => 'required|in:Active,Inactive',
        ]);

        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'published_date' => $request->input('published_date'),
            'genre' => $request->input('genre'),
            'language' => $request->input('language'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('ad_book.index')->with('success', 'Book updated successfully.');
    }
    
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.ad_book.update', compact('book'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        // Tạo sách mới
        $book = Book::create($request->all());

        // Kiểm tra xem sách đã được tạo chưa
        if ($book) {
            return redirect()->route('ad_book.index')->with('success', 'Book added successfully.');
        } else {
            return response()->json(['success' => false, 'message' => 'Book could not be added.']);
        }
    }
    
    public function bookshelf()
    {
        $books = Book::all();
        return view('user.bookshelf', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('user.book_details', compact('book'));
    }
}
