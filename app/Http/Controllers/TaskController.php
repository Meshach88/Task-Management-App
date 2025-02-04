<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after:today', // Ensure due date is in the future
            'status' => 'in:pending,completed',
        ]);

        // Ensure the user is authenticated before creating a task
        $user = Auth::user(); //Get the logged-in user
        if ($user) {
            // Create a new task and assign it to the user
            $task = new Task($request->all());
            $task->user_id = $user->id; // Assign the task to the authenticated user
            $task->save();

            return redirect()->route('tasks.index')->with('success', 'Task added successfully.');

            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        }
        return redirect()->route('login')->with('error', 'Please log in to add a task.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
            'due_date' => 'required|date|after:today',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function storeComment(Request $request, Task $task)
{
    $request->validate(['comment' => 'required']);

    $task->comments()->create([
        'comment' => $request->comment,
        // 'user_id' => auth()->id(),
    ]);

    return back();
}

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
