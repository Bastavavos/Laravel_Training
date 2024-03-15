<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->orderBy('due_date')->get();

        return view('admin.tasks.index', compact('tasks'));
    }
}
