<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'book_name' => 'sometimes|required|string|max:100',
            'book_author_name' => 'sometimes|required|string|max:100',
            'book_price' => 'sometimes|required|numeric|min:0',
            'book_stock' => 'sometimes|required|integer|min:0',
            'book_status' => 'sometimes|required|boolean',

            'category_id' => 'sometimes|required|exists:categories,id',

            'barcode' => 'sometimes|required|string|max:50',
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
            'barcode.required' => 'El código de barras es obligatorio.',
        ];
    }
}