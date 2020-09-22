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
        'image_path',        
        'status'

    ];

    //public function user(){

      //  return $this->belongsTo('App\User');

    //}

    public function photos(){

        return $this->belongsTo('App\Photoalbum');
        
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
}
