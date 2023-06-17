<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostsResource;
use App\Http\Resources\TrashResource;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:sanctum'])->only('store','update','destroy','trash');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();
        return PostsResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Posts::create([
            'title'=> $request->input('title'),
            'content' => $request->input('content')
        ]);

        return new PostDetailResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Posts::findOrFail($id);
        return new PostDetailResource($post);
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
            'title' => 'string',
            'content' => 'string'
        ]);

        $post = Posts::findOrFail($id);
        $post->update($request->all());

        return new PostDetailResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return response()->json([
            "message" => "Your Post Have Been Deleted"
        ]);
    }

    public function trash(){
        dd('halo');
        $trash_posts = Posts::onlyTrashed()->get();

        return new TrashResource($trash_posts);
    }
}
