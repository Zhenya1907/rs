<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'with' => 'nullable|array',
            'with.*' => 'string',
            'properties' => 'nullable|array',
            'properties.*' => 'array',
            'properties.*.*' => 'string',
        ];
    }
}
