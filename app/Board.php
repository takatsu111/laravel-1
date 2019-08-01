<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable=['name','category_id'];
    
    public function contentsOrderByDesc(){
        return $this->hasMany('App\Content')->orderBy('created_at','desc');
    }
    
    public function contents(){
        return $this->hasMany('App\Content');
    }
    
    public function categories(){
        return $this->belongsToMany('App\Category');
    }   
}
