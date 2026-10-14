@extends('layouts.app')

@section('content')
    <a href="{{ route('tasks.create') }}">Создать задачу</a>

    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td class="{{ $task->is_completed ? 'completed' : '' }}">
                        {{ $task->title }}
                    </td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->is_completed ? 'Выполнена' : 'Активна' }}</td>
                    <td>
                        @if (!$task->is_completed)
                            <form action="{{ route('tasks.complete', $task) }}" method="POST" style="display:inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Завершить</button>
                            </form>
                        @endif
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Удалить задачу?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Задач пока нет.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection