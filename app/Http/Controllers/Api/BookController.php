<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
{
    $books = Book::with('category')->get();

    return response()->json($books, 200);
}

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        return response()->json([
            'message' => 'Libro creado correctamente',
            'data' => $book
        ], 201);
    }

    public function show(string $id)
{
    $book = Book::with('category')->find($id);

    if (!$book) {
        return response()->json([
            'message' => 'Libro no encontrado'
        ], 404);
    }

    return response()->json($book, 200);
}

    public function update(UpdateBookRequest $request, string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Libro no encontrado'
            ], 404);
        }

        $book->update($request->validated());

        return response()->json([
            'message' => 'Libro actualizado correctamente',
            'data' => $book
        ], 200);
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Libro no encontrado'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'message' => 'Libro eliminado correctamente'
        ], 200);
    }
}