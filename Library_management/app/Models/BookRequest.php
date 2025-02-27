<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id', 
        'username', 
        'book_title', 
        'request_date', 
        'due_date', 
        'status'
    ];

    // Mối quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ với bảng books
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
