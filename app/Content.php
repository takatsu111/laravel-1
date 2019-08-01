<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable=['board_id','user_id','content','good'];
    
    public function board(){
        return $this->belongsTo('App\Board');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
