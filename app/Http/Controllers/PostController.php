<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function trashPost()
    {

        $trashedPosts = Post::onlyTrashed()->get();
        return view('backend.post.trash-post', compact('trashedPosts'));
    }


    public function index()
    {
        return view('backend.post.index')->with('posts', Post::all());
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('backend.post.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);

        //Image Upload
        $image = $request->file('image');
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $imageUrl = request()->image->move(('storage/image'), $imageName);

        //Slug
        $slug = str_slug($request->title);

        $post = new Post();

        $post->user_id = Auth::id();

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $slug;
        $post->image = $imageUrl;
        $post->body = $request->body;

        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }

        $post->save();

        $post->tags()->attach($request->tags);

        session()->flash('success', 'Post Created Successfully.');
        return redirect(route('post.index'));

    }


    public function show(Post $post)
    {
        return view('backend.post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('backend.post.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'unique:posts,slug,' . $post->id,
            'image' => 'mimes:jpeg,png,jpg',
            'category_id' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);


        //Image Upload
        $image = $request->file('image');

        if (isset($image)) {

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            $imageUrl = request()->image->move(('storage/image'), $imageName);

            unlink($post->image);
        } else {
            $imageUrl = $post->image;
        }

        //Slug Form Title
        $slug = str_slug($request->title);


        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $slug;
        $post->image = $imageUrl;
        $post->body = $request->body;

        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }

        $post->save();

        $post->tags()->sync($request->tags);

        session()->flash('success', 'Post Updated Successfully.');
        return redirect(route('post.index'));


    }


    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->first();

        if ($post->trashed()) {

            unlink($post->image);
            $post->forceDelete();

            $post->tags()->detach();

            session()->flash('success', 'Post Moved To Trashed');
            return redirect(route('post.trash'));

        } else {
            $post->delete();

            session()->flash('success', 'Post Moved To Trashed');
            return redirect(route('post.index'));
        }


    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();


        session()->flash('success', 'Post Restored To Trashed');
        return redirect(route('post.index'));
    }
}
