<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Board;

class BoardController extends Controller
{
    public function test(){
        return redirect('/board/1');
    }
    
    public function index($id = 1){
        if(ctype_digit($id)){
        $board = Board::find($id);
        $contents = Content::where('board_id',$id)->get();
        return view('boards.show-post',['contents'=>$contents,'board'=>$board]);
        }else{
            return redirect('/board/1');
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
