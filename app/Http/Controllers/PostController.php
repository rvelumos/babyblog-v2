<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:6',
            'body' => 'required|min:40',
        ]);


        $post = new post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = Auth::user()->name;
        $post->category_id = $request->input('category_id');        

        $post->save();

        Session::flash('stored_message', 'Blogitem toegevoegd!');
        Session::flash('alert-class', 'alert-success'); 

        //return view('admin.posts.edit', compact('post', $post->id));
        return redirect()->route('admin.posts.index');
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
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
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
        $this->validate($request, [
            'title' => 'required|min:6',
            'body' => 'required|min:40',
        ]);


        $post = new post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');        

        Post::where('id', $id)
                ->update(['title' => $post->title,
                         'body'=>$post->body,
                         'status'=>$post->status]
                        );      

        Session::flash('stored_message', 'Blogitem aangepast!');
        Session::flash('alert-class', 'alert-success'); 

        //return view('admin.posts.edit', compact('post', $post->id));
        return redirect()->route('admin.posts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('stored_message','Blogitem is succesvol verwijderd');
        Session::flash('alert-class', 'alert-success'); 

        return back();
    }

    public function search(request $request)
     {

        $search_phrase = $request->input('search_field');

        $posts = Post::where('title', 'like', '%' . $search_phrase . '%')->get();
        $count = $posts->count();

        return view('posts.results', compact('search_phrase', 'posts', 'count'));
     }

}
