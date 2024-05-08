<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Mail\TaskCreated;
use Illuminate\Support\Facades\Mail;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index',['todos' => $todos]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|alpha|max:255',
        'description' => 'required|string',
        'status' => 'required|in:progress,completed',
        'due_date' => 'nullable|date',
        'urgent' => 'boolean',
        'user_id' => 'nullable',
    ]);
        $todo = new Todo($request->all());
        // $todo->name = $request->name;
        // $todo->description = $request->description;
        $todo->user_id = auth()->user()->id;
        $todo->save();
        // // Send email to authenticated user
        // Mail::to(auth()->user())->send(new TaskCreated($todo));
        session()->flash('success', 'Todo created succesfully');
        return redirect('/index');

    }
    public function details(Todo $todo)
    {
        return view('details',['todo' => $todo]);
    }
    public function edit(Todo $todo)
    {
        return view('edit',['todo' => $todo]);
    }
    public function update(Request $request,Todo $todo)
    {
        $request->validate([
            'name' => 'required|string|alpha|max:255',
            'description' => 'required|string',
            'status' => 'required|in:progress,completed',
            'due_date' => 'nullable|date',
            'urgent' => 'boolean',
            'user_id' => 'nullable',
        ]);
        // $todo = Todo::where('id',$todo)->first();
        // $todo->name = $request->name;
        // $todo->description = $request->description;
        $todo->update($request->all());
        $todo->save();
        session()->flash('success', 'Todo updated successfully');
        return redirect('/index');
    }
    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect('/index');
    }
}
