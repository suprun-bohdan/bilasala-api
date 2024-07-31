<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'sometimes|required|string|max:50',
            'make' => 'sometimes|required|string|max:50',
            'model' => 'sometimes|required|string|max:50',
            'year' => 'sometimes|required|integer',
            'mileage' => 'sometimes|required|integer',
            'color' => 'sometimes|required|string|max:20',
            'price' => 'sometimes|required|numeric',
            'description' => 'nullable|string',
            'photos' => 'nullable|json',
        ];
    }
}
