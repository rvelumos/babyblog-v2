<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{

    public $directory = "/images/";
//    use SoftDeletes;
    //

    protected $fillable = [

        'title',
        'body',
        'name',
        'message',
        'image_path',        
        'status'

    ];

    //public function user(){

      //  return $this->belongsTo('App\User');

    //}

    public function photos(){

        return $this->belongsTo('App\Photoalbum');
        
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function categories(){

        return $this->morphToMany('App\Category');

    }
    
    
    public static function scopeLatest($query){

       // return $query->orderBy('id', 'desc')->get();
     }
     
     public function getPathAttribute($value){
        return $this->directory . $value;

     }

     public static function commentCounter($id){

      $comments = Comment::where('post_id', $id)->count();
       
      return ($comments);
     }

     public static function getComments($id, $section)
     {
                
         $comments = Comment::where($section, $id)->get()->sortByDesc('created_at');
         //$comments = DB::table('comments')->where('post_id', $id)->get();

         echo "<div class='reaction_item_holder'>";
         if($comments!=null){        
            
             foreach($comments as $comment){                 
                 echo "<div class='reaction_item my-4 p-2'><div class='reaction_top mx-3'>";
                 echo "<div class='reaction_name'>".$comment->name."</div>";
                 echo "<div class='reaction_date'>".$comment->created_at->diffForHumans()."</div></div>";
                 echo "<div class='reaction_body p-3'>".$comment->message."</div></div>";
             }            
         }else{             
             echo "<p class='empty'>Geen reacties gevonden</p>";
         }
         echo "</div>";
     }
}
