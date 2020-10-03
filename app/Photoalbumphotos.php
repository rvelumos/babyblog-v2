<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photoalbumphotos extends Model
{
    protected $fillable = [
        'name',
        'description',
        'album_id'        
    ];
}
