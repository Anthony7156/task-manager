@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Задачи</h1>
        <span class="text-sm text-gray-500">
            Всего: {{ $tasks->count() }}
        </span>
    </div>

    @forelse ($tasks as $task)
        <div class="mb-3 flex flex-col gap-4 rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                    <h2 class="text-base font-semibold text-gray-900">
                        {{ $task->title }}
                    </h2>

                    @if ($task->is_completed)
                        <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                            Выполнена
                        </span>
                    @else
                        <span class="inline-flex items-center rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-medium text-amber-800">
                            Активна
                        </span>
                    @endif
                </div>

                @if ($task->description)
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $task->description }}
                    </p>
                @endif
            </div>

            <div class="flex shrink-0 items-center gap-2">
                @if (!$task->is_completed)
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="rounded-lg border border-indigo-200 bg-indigo-50 px-3 py-1.5 text-xs font-medium text-indigo-700 transition hover:bg-indigo-100">
                            Завершить
                        </button>
                    </form>
                @endif

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Удалить задачу?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-700 transition hover:bg-red-100">
                        Удалить
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="rounded-xl border border-dashed border-gray-300 bg-white px-6 py-12 text-center">
            <p class="text-sm text-gray-500">Задач пока нет.</p>
            <a href="/tasks/create" class="mt-3 inline-block text-sm font-medium text-indigo-600 hover:text-indigo-700">
                Создать первую задачу →
            </a>
        </div>
    @endforelse
@endsection