<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable=['name','category_id'];
    
    public function categories(){
        return $this->belongsToMany('App\Category');
    }   
}
