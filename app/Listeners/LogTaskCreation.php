<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Support\Facades\Log;

class LogTaskCreation
{
    public function handle(TaskCreated $event): void
    {
        Log::info('Создана новая задача: ' . $event->task->title);
    }
}