<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome',[
            'todos' =>$todos
        ]);

    }
    public function store(){
       $attributes = request()->validate([
            'title' => 'required',
            'description' => 'nullable'
       ]);
       TODO::create($attributes);
    //    Session::flash('message', 'Listing created');

       return redirect('/')->with('message','Created succesfully');
    }

    public function update(Todo $todo){
        
        $todo->update(['isDone' => !$todo->isDone]);
        return redirect('/')->with('message','Update succesfully');;
    }
    
public function destroy(Todo $todo){
    $todo->delete();

    return redirect('/')->with('message','Deleted succesfully');

}
}
