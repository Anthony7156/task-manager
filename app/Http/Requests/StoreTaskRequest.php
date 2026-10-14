<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле «Название» обязательно для заполнения.',
            'title.max' => 'Название не должно превышать 255 символов.',
            'description.max' => 'Описание не должно превышать 1000 символов.',
        ];
    }
}