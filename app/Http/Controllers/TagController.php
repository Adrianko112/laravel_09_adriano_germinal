<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create()
    {
        
        return view('tags.create');
    }

    public function submit(Request $request)
    {

       request()->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);
       Tag::create(['name' => $request->name]);

        return redirect()->route('home')->with('success', 'Tag creato con successo!');
    }

    public function index()
    {
        $tags = Tag::all()->sortBy('name');
        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag)

    {
       
        return view('tags.show', compact('tag'));
    }
}
