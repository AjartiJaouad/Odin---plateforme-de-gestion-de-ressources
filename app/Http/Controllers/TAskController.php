<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TAskController extends Controller
{
    public function stors(Request $request ,Category $category){
        $request->validate([
            'title' => 'request|string|max:255',
        ]);
        $category->tasks()->create([
            'title'=>$request->title,
            'sattus'=>'tofo',
        ]);
        return back()->with('success','tacche ajouter !');
    }
}
