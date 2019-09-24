<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return view('backend.tag.index')->with('tags', Tag::all());
    }


    public function create()
    {
        return view('backend.tag.create');

    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:tags'
        ]);

        Tag::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Tag Created Successfully.');
        return redirect(route('tag.create'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Tag $tag)
    {
        return view('backend.tag.edit')->with('tag', $tag);
    }


    public function update(Request $request, Tag $tag)
    {
        $this->validate(request(), [
            'name' => 'required|unique:tags,name,'.$tag->id
        ]);


        $tag->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag Updated Successfully.');
        return redirect(route('tag.index'));
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();

        session()->flash('success', 'Tag Deleted Successfully.');
        return redirect(route('tag.index'));
    }
}
