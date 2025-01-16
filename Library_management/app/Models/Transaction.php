<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'username',
        'book_title',
        'due_date',
        'status',
        'returned',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $book = Book::find($transaction->book_id);
            $transaction->book_title = $book ? $book->title : '';
        });
    }
}
