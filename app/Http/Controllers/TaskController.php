<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
}
use App\Events\TaskCreated;

public function store(StoreTaskRequest $request)
{
    $validated = $request->validated();

    $task = Task::create($validated);

    // Вызываем событие
    event(new TaskCreated($task));

    session()->flash('success', 'Задача «' . $task->title . '» успешно создана!');

    return redirect()->route('tasks.index');
}