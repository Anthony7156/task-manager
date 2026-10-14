@extends('layouts.app')

@section('content')
    <h2>Создать новую задачу</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Название:</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div style="margin-top: 10px;">
            <label for="description">Описание:</label><br>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit" style="margin-top: 10px;">Сохранить</button>
    </form>
@endsection