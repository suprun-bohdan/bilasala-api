<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required|string|max:50',
            'make' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'year' => 'required|integer',
            'mileage' => 'required|integer',
            'color' => 'required|string|max:20',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'photos' => 'nullable|json',
        ];
    }
}
