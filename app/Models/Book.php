<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'id_book';

    protected $fillable = [
        'book_name',
        'book_author_name',
        'book_price',
        'book_stock',
        'book_status',
    ];
}