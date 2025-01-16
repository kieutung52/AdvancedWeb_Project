<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy tất cả người dùng và sách từ cơ sở dữ liệu
        $users = User::all();
        $books = Book::all();

        // Kiểm tra nếu có người dùng và sách
        if ($users->isEmpty() || $books->isEmpty()) {
            echo "Không có đủ người dùng hoặc sách trong cơ sở dữ liệu.";
            return;
        }

        // Tạo giao dịch mẫu cho người dùng và sách
        foreach ($users as $user) {
            foreach ($books as $book) {
                DB::table('transactions')->insert([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'username' => $user->name,
                    'book_title' => $book->title,
                    'due_date' => Carbon::now()->addDays(rand(7, 30)),
                    'status' => 'In period',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
