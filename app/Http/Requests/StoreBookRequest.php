<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'book_name' => 'required|string|max:100',
            'book_author_name' => 'required|string|max:100',
            'book_price' => 'required|numeric|min:0',
            'book_stock' => 'required|integer|min:0',
            'book_status' => 'required|boolean',

            'category_id' => 'required|exists:categories,id',

            'barcode' => 'required|string|max:50',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Errores de validación',
                'errors' => $validator->errors()
            ], 422)
        );
    }

    
    public function messages(): array
    {
        return [
            'category_id.exists' => 'La categoría seleccionada no existe.',
            'category_id.required' => 'La categoría es obligatoria.',
            'barcode.required' => 'El código de barras es obligatorio.',
        ];
    }
}