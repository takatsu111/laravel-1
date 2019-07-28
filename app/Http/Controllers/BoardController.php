<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class BoardController extends Controller
{
    public function test(){
        return redirect('/board');
    }
    
    public function index(){
        $contents = Content::all();
        return view('boards.show-post',['contents'=>$contents]);
    }
    
    public function post(Request $req){
        $req -> validate([
            'board'=>'integer|required',
            'content'=>'required|string|max:191',
            'user'=>'required|string|max:191'
        ]);
        
        $content = new Content;
        $content -> fill($req->all())->save();
        
        return redirect('/board');
        
    }
}
