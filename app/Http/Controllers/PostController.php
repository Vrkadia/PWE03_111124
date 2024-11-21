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
    public function viewDashboard(){
        return view('dashboard', [
            'posts' => Post::all(),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        return view('post.detailCard', [
            'post' => Post::findOrFail($id)
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
            'image' => ['nullable', 'image'],
            'document' => ['required', 'mimes:pdf', 'max:2048'],
            'body' => ['required', 'min:5'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post/image/');
        }

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'image' => $imagePath,
            'document' => $request->file('document')->store('post/document/'),
            'body' => $request->body,
        ]);
        return redirect()->route('post.index');
    }



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
            'image' => ['nullable', 'image'],
            'document' => ['nullable', 'mimes:pdf', 'max:2048'],
            'body' => ['required', 'min:5'],
        ]);
        $post = Post::find($id);

        if ($request->hasFile('image')) {
            Storage::delete($post->image);
            $post->image = $request->file('image')->store('post/image/');
        }

        if ($request->hasFile('document')) {
            Storage::delete($post->document);
            $post->document = $request->file('document')->store('post/document/');
        }

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post->image) {
            Storage::delete($post->image);
        }

        if ($post->document) {
            Storage::delete($post->document);
        }

        $post->delete();

        return redirect()->route('post.index');
    }
}
