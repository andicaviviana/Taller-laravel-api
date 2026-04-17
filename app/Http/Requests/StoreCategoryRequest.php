<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'priority' => 'required|integer|min:1',
        'status' => 'required|boolean',
    ];
}
}
