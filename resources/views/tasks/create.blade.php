@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-xl">
        <div class="mb-6">
            <a href="/tasks" class="text-sm text-gray-500 hover:text-gray-700">
                ← Назад к задачам
            </a>
            <h1 class="mt-2 text-2xl font-bold text-gray-900">Создать новую задачу</h1>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3">
                <ul class="list-inside list-disc space-y-1 text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5 rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label for="title" class="mb-1.5 block text-sm font-medium text-gray-700">
                    Название
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm transition focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                       placeholder="Например, подготовить отчёт">
            </div>

            <div>
                <label for="description" class="mb-1.5 block text-sm font-medium text-gray-700">
                    Описание
                </label>
                <textarea name="description" id="description" rows="4"
                          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm transition focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                          placeholder="Детали задачи (необязательно)">{{ old('description') }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-4">
                <a href="/tasks" class="rounded-lg px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100">
                    Отмена
                </a>
                <button type="submit" class="rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-700">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
@endsection