<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    public $directory = "/images/";
    use SoftDeletes;
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

     public static function getComments($id)
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
}
