<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manage Your Job Postings';
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('admin.post.index', compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Your Job Postings';
        return view('admin.post.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'job_status' => 'required|in:part-time,full-time',
            'image' => 'image|file|max:2048',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('posts-image', 'public');
        }

        $validatedData['user_id'] = $user->id;

        Post::create($validatedData);

        return redirect('/admin/posts')->with('success', 'New post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $title = 'Detail Job Posting';
        return view('admin.post.show', compact('title', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $title = 'Update Job Posting';
        return view('admin.post.update', compact('title', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $user = Auth::user();
        $rules = [
            'title' => 'required|max:255',
            'job_status' => 'required|in:part-time,full-time',
            'image' => 'image|file|max:2048',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::disk('public')->delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('posts-image', 'public');
        }

        $validatedData['user_id'] = $user->id;

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/admin/posts')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/admin/posts')->with('success', 'Post deleted successfully.');
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function updateStatus(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:public,private',
        ]);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/admin/posts/' . $post->slug)->with('success', 'Status updated successfully.');
    }
}
