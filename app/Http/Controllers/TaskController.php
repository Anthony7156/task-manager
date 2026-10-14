<?php

namespace App\Http\Controllers;

use App\Events\TaskCreated;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        $task = Task::create($validated);

        // Вызываем событие
        event(new TaskCreated($task));

        session()->flash('success', 'Задача «' . $task->title . '» успешно создана!');

        return redirect()->route('tasks.index');
    }

    public function complete(Task $task)
    {
        $task->update(['is_completed' => true]);

        session()->flash('success', 'Задача «' . $task->title . '» отмечена как выполненная!');

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        session()->flash('success', 'Задача удалена.');

        return redirect()->route('tasks.index');
    }
}