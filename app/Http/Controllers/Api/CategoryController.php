<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    //  LISTAR TODAS (CON LIBROS)
    public function index()
    {
        $categories = Category::with('books')->get();

        return response()->json($categories, 200);
    }

    //  CREAR
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return response()->json([
            'message' => 'Categoría creada correctamente',
            'data' => $category
        ], 201);
    }

    //  MOSTRAR UNA (CON LIBROS)
    public function show(string $id)
    {
        $category = Category::with('books')->find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        return response()->json($category, 200);
    }

    //  ACTUALIZAR
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        $category->update($request->validated());

        return response()->json([
            'message' => 'Categoría actualizada correctamente',
            'data' => $category
        ], 200);
    }

    //  ELIMINAR
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Categoría eliminada correctamente'
        ], 200);
    }

   
    public function activeWithBooks()
    {
        $categories = Category::with('books')
            ->where('status', true)
            ->get();

        return response()->json($categories, 200);
    }
}