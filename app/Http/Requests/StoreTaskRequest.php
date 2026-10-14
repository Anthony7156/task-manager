<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
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


use App\Http\Requests\StoreTaskRequest;

public function store(StoreTaskRequest $request)
{
    $validated = $request->validated();

    $task = Task::create($validated);

    return redirect()->route('tasks.index');
}