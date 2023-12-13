<?php

namespace App\Http\Controllers;

use id;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreTodoRequest;
use Attribute;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', 
        // ['todos' => $todos ]
        compact('todos')
    );
    }

    public function create()
    {
        // Add logic for creating a new resource if needed
    }

    // public function store(Request $request)
    public function store(StoreTodoRequest $request)
    {
        // $attributes = $request->validate([
        //     'title' => 'required|min:5',
        //     'description' => 'nullable'
        // ]);

        $attributes = $request->validated();


        Todo::create($attributes);
        return redirect('/todos')->with('message', 'Created successfully');
    }

    public function show(string $id)
    {
        // Logic to show a specific resource
    }

    public function edit(string $id)
    {
        // Logic for editing a specific resource
        
    }


    public function update(Request $request, Todo $todo)
    {
        $todo->update(['isDone' => !$todo->isDone]);
        return redirect('/todos')->with('message', 'Updated successfully');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/todos')->with('message', 'Deleted successfully');
    }
}
