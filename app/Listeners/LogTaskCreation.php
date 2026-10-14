<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogTaskCreation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskCreated $event): void
    {
        //
    }
}
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