<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class ExtracurricularRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'institution-slug' => ['nullable', 'exists:institutions,slug']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
