<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function show($id)
    {
        $comments = Comment::findOrFail($id);

        echo "<div class='reaction_item_holder'>";
        if($comments->count()>0){        
            foreach($comments as $comment){
                echo "<div class='reaction_item my-4'><div class='reaction_top mx-3 p-3'>";
                echo "<div class='reaction_name mx-3 p-3'>".$comment->name."</div>";
                echo "<div class='reaction_date mx-3 p-3'>".$comment->created_at->diffForHumans()."</div></div>";
                echo "<div class='reaction_body mx-3 p-3'>".$comment->body."</div></div>";
            }            
        }else{
            echo "<p class='empty'>Geen reacties gevonden</p>";
        }
        echo "</div>";
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
        //die($request->input('name'));
        
        $comment = new comment();
        $comment->name = $request->input('name');
        $comment->post_id = $request->input('post_id');
        $comment->message = $request->input('message');
        $comment->ip = $_SERVER['REMOTE_ADDR'];
        $comment->section = 'blog';
        $comment->save();

        $post_id=$comment->post_id;

        Session::flash('flash_message', 'Reactie toegevoegd!');
        
        return route('post.show', compact('post_id'));
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

}
