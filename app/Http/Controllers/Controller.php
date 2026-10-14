<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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

    // Метод store будет дополнен в следующем шаге

    public function complete(Task $task)
    {
        $task->update(['is_completed' => true]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}