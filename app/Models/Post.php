<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'post',
        'image',
        'user_id'
    ];

    public function likes_count(){
        return $this->hasMany('App\Models\Reaction');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function isLiked(){
        if(auth()->check()){
            if(Reaction::where('user_id',auth()->user()->id)
                                   ->where('post_id',$this->id)->count()){
                return Reaction::where('user_id',auth()->user()->id)
                ->where('post_id',$this->id)->count();              
            }
            return false;
        }
        return false;
    }

    public function removeLike()

    {
        if (auth()->check()) {
            return Reaction::where('user_id',auth()->user()->id)
            ->where('post_id',$this->id)->delete();
            
        }
        return false;
    }
}
