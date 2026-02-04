<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function store(Request $request ,Category $category){
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $category->tasks()->create([
            'title'=>$request->title,
            'status'=>'tofo',
        ]);
        return back()->with('success','tacche ajouter !');
    }
    public function update(Task $task){
        $task->update([
            'status'=> $task->status === 'done' ? 'todo' : 'done'
        ]);
        return back();
    }
    public function destroy(Task $task){
     $task->delete();
     return back()->with('success ','tache supprimeé !');
    }
    public function updateTitle(Request $request ,Task $task){
        $request->validate([
            'title'=>'required|string|max:255',
        ]);

        $task->update([

        'title'=>$request->title]);
        return back()->with('success','tache modfiée !');
    }
}
