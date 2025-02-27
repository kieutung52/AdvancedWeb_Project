<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\BookRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return view('admin.ad_user.users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('ad_user.users')->with('success', 'User deleted successfully.');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.ad_user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('ad_user.users')->with('success', 'User updated successfully.');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|string|in:admin,user',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);   
            return redirect()->route('ad_user.users')->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    public function home()
    {
        $quotes = [
            (object) [
                'id' => 'q1',
                'quote' => "So many books, so little time.",
                'author' => "Frank Zappa",
                'book' => "Autobiography",
            ],
            (object) [
                'id' => 'q2',
                'quote' => "A room without books is like a body without a soul.",
                'author' => "Marcus Tullius Cicero",
                'book' => "On the Pleasures of Reading",
            ],
            (object) [
                'id' => 'q3',
                'quote' => "The person, be it gentleman or lady, who has not pleasure in a good novel, must be intolerably stupid.",
                'author' => "Jane Austen",
                'book' => "Northanger Abbey",
            ],
            (object) [
                'id' => 'q4',
                'quote' => "Books are a uniquely portable magic.",
                'author' => "Stephen King",
                'book' => "On Writing: A Memoir of the Craft",
            ],
            (object) [
                'id' => 'q5',
                'quote' => "If you only read the books that everyone else is reading, you can only think what everyone else is thinking.",
                'author' => "Haruki Murakami",
                'book' => "Norwegian Wood",
            ],
            (object) [
                'id' => 'q6',
                'quote' => "Libraries were full of ideas—perhaps the most dangerous and powerful of all weapons.",
                'author' => "Sarah J. Maas",
                'book' => "Throne of Glass",
            ],
        ];
        return view('user.index', compact('quotes'));
    }

    public function homeAdmin()
    {
        $bookCount = Book::count();
        $userCount = User::count();
        $requestCount = BookRequest::count();
        $transactionCount = Transaction::count();
        return view('admin.home', compact('bookCount', 'userCount', 'requestCount', 'transactionCount'));
    }
}
