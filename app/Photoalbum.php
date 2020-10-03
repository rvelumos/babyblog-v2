<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photoalbum extends Model
{
    protected $fillable = [
        'name',
        'description', 
        'album_id'       
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'album_id');
    }

    public function photoalbumphotos()
    {
        return $this->hasMany('App\Photoalbumphotos', 'album_id');
    }
    
    public static function getPhotos($id)
    {
               
        $photos = Photoalbumphotos::where('album_id', $id)->get()->sortByDesc('created_at');        

        echo "<div class='album_item_holder'>";
         if($photos!=null){                    
             foreach($photos as $photo){                                  
                 echo "<a href='".route('photoalbumphotos.show', ['photo_id' => $photo->id, 'album_id' => $photo->album_id])."'><div class='album_item my-4 p-2'><img class='thumbnail' src='../" . $photo->image . "' /></div></a>";
             }            
         }else{             
             echo "<p class='empty'>Geen reacties gevonden</p>";
         }
         echo "</div>";
    }
}
