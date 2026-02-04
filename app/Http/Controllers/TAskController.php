<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
