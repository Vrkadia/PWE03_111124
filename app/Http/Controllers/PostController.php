<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', [
            'posts' => Post::where('user_id', auth()->id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'image' => ['required', 'image'],
            'body' => ['required', 'min:5'],
        ]);
        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'image' => $request->file('image')->store('post/image/'),
            'body' => $request->body,
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('post.edit', [
                'post' => Post::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required'],
            'image' => ['required', 'image'],
            'body' => ['required', 'min:5'],
        ]);
        $post = Post::find($id);
        $image = $post->image;
        if ($request->hasFile('image')) {
            Storage::delete($image);
            $image = $request->file('image')->store('post/image/');
        }
        $post->update([
            'title' => $request->title,
            'image' => $image,
            'body' => $request->body,
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
