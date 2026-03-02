<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string'],
            'post-category' => ['nullable', 'exists:post_categories,slug'],
            'institution' => ['nullable', 'exists:institutions,slug'],
            'tag' => ['nullable', 'string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
