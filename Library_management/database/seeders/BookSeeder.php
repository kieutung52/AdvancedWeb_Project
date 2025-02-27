<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'genre' => 'Fiction',
                'language' => 'EN',
                'description' => 'A classic novel set in the American South, dealing with issues of racial inequality and injustice.',
                'status' => 'Active',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'genre' => 'Science Fiction',
                'language' => 'EN',
                'description' => 'A dystopian novel about a totalitarian government that controls every aspect of its citizens\' lives.',
                'status' => 'Active',
            ],
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'genre' => 'Fiction',
                'language' => 'EN',
                'description' => 'A story of wealth, love, and the American Dream during the Roaring Twenties.',
                'status' => 'Active',
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'genre' => 'Romance',
                'language' => 'EN',
                'description' => 'A novel about love and social class in 19th-century England.',
                'status' => 'Active',
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'genre' => 'Fiction',
                'language' => 'EN',
                'description' => 'A coming-of-age novel about a disillusioned teenager who struggles with the phoniness of the adult world.',
                'status' => 'Active',
            ],
            [
                'title' => 'Moby-Dick',
                'author' => 'Herman Melville',
                'genre' => 'Adventure',
                'language' => 'EN',
                'description' => 'The story of Captain Ahab\'s obsessive quest for revenge against the white whale that maimed him.',
                'status' => 'Active',
            ],
            [
                'title' => 'War and Peace',
                'author' => 'Leo Tolstoy',
                'genre' => 'Historical Fiction',
                'language' => 'VN',
                'description' => 'An epic novel about the Napoleonic Wars and their impact on Russian society.',
                'status' => 'Active',
            ],
            [
                'title' => 'The Lord of the Rings',
                'author' => 'J.R.R. Tolkien',
                'genre' => 'Fantasy',
                'language' => 'EN',
                'description' => 'A high fantasy epic about a quest to destroy a powerful ring and save Middle-earth from the Dark Lord Sauron.',
                'status' => 'Active',
            ],
            [
                'title' => 'One Hundred Years of Solitude',
                'author' => 'Gabriel García Márquez',
                'genre' => 'Magical Realism',
                'language' => 'EN',
                'description' => 'A multi-generational saga of the Buendía family and their town of Macondo.',
                'status' => 'Active',
            ],
            [
                'title' => 'The Adventures of Huckleberry Finn',
                'author' => 'Mark Twain',
                'genre' => 'Adventure',
                'language' => 'EN',
                'description' => 'A story of a boy and a runaway slave who travel down the Mississippi River on a raft.',
                'status' => 'Active',
            ],
        ]);
    }
}
