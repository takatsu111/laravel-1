<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class BoardController extends Controller
{
    public function test(){
        return redirect('/board/0');
    }
    
    public function index($id = 0){
        if(ctype_digit($id)){
        $contents = Content::where('board',$id)->get();
        return view('boards.show-post',['contents'=>$contents,'board'=>$id]);
        }else{
            return redirect('/board/0');
        }
    }
    
    public function post(Request $req){
        $req -> validate([
            'board'=>'integer|required',
            'content'=>'required|string|max:191',
            'user'=>'required|string|max:191'
        ]);
        
        $content = new Content;
        $content -> fill($req->all())->save();
        $board = $req->input('board');
        
        return redirect('/board/'.$board);
        
    }
}
