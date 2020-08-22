<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function post(){

        return $this->hasOne('App\Post');
        //return $this->hasOne('App\Post', 'uid'); specify other column name, user_id = standard

    }

    public function posts(){

        return $this->hasMany('App\Post');
    }

    
    public function photos(){

        return $this->morphMany('App\Photo','imageable');

    }

    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at');
        //return $this->belongsToMany('App\Role','user_roles','user_id','role_id'); specify different column
    }

    public function getNameAttribute($value){

        return str_replace("Ronaldo", "Hoi", $value);
    }

    public function setNameAttribute($value){

        $this->attributes['name']=$name = strtoupper($value);
        

    }
}
