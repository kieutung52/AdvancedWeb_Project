<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'genre' => 'Classic',
            'language' => 'EN',
            'status' => 'Active',
        ]);

        Book::create([
            'title' => 'Những Người Khốn Khổ',
            'author' => 'Victor Hugo',
            'genre' => 'Novel',
            'language' => 'VN',
            'status' => 'Active',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'genre' => 'Fiction',
            'language' => 'EN',
            'status' => 'Inactive',
        ]);
    }
}
