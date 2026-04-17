<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; 

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
        'category_id',
        'barcode' 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}