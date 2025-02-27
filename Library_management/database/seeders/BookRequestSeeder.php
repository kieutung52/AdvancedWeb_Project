<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookRequest;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;

class BookRequestSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $books = Book::all();

        if ($users->isEmpty() || $books->isEmpty()) {
            $this->command->info('Không có dữ liệu người dùng hoặc sách.');
            return;
        }

        foreach ($users as $user) {
            foreach ($books as $book) {
                BookRequest::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'username' => $user->name,
                    'book_title' => $book->title,
                    'request_date' => Carbon::now()->subDays(rand(1, 30)),
                    'due_date' => Carbon::now()->addDays(rand(5, 15)),
                    'status' => 'Pending',
                ]);
            }
        }
    }
}