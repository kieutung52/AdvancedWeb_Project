<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre',
        'language',
        'description',
        'status',
    ];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function bookRequests()
    {
        return $this->hasMany(BookRequest::class);
    }
}
