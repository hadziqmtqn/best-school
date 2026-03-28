<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class SchoolIdentityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'institution' => ['nullable', 'exists:institutions,slug']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
