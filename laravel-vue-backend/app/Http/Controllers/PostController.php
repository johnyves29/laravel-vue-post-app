<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve the sort parameter from the request, default to 'desc'
        $sort = $request->input('sort', 'desc');
        
        // Get all posts sorted by the created_at column in descending order
        $posts = Post::orderBy('created_at', $sort)->get();

        // Return the products as a JSON response
        return response()->json($posts);
        // return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        return Post::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();

        return response()->noContent();
    }
}
