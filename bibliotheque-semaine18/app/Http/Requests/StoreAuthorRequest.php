<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isStaffOrAdmin();
    }

    public function rules(): array
    {
        $authorId = $this->route('author')?->id;

        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('authors', 'email')->ignore($authorId)],
            'phone' => ['nullable', 'string', 'max:30'],
        ];
    }
}
