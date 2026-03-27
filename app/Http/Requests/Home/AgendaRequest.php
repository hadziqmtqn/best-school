<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string'],
            'month' => ['nullable', 'integer'],
            'year' => ['nullable', 'integer']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
