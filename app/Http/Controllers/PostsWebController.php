<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsWebController extends Controller
{
    // public function __construct(){
    //     $this->middleware(['auth:sanctum']);
    // } 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::get();
        $view_data=[
            'posts' => $posts
        ];
        return view('posts.index', $view_data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $selected_post = Posts::where('id', $id)->first();

        $view_data=[
            'selected_post' => $selected_post
        ];

        
        return view('posts.show', $view_data);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
