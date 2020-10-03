<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
    $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
    
    setlocale(LC_ALL, 'nl_NL');

     return view('posts.posts', compact('posts'));

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy($id)
    {
        //
    }

    public function search(request $request)
     {

        $search_phrase = $request->input('search_field');

        $posts = Post::where('title', 'like', '%' . $search_phrase . '%')->get();
        $count = $posts->count();

        return view('posts.results', compact('search_phrase', 'posts', 'count'));
     }

}
