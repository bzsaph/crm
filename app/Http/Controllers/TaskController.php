<?php

namespace App\Http\Controllers;

use App\Task;
use App\Client;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Client $client)
    {
        $tasks = $client->tasks;
        return view('admin.tasks.index', compact('tasks', 'client'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required',
            'description' => 'nullable',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index', $request->client_id)->with('success', 'Task added successfully.');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:pending,completed',
        ]);

        $task->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Task updated successfully.');
    }
}
