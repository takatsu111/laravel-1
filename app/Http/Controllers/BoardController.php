<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Content;
use App\Board;


class BoardController extends Controller
{
    public function welcome(){
        $board = new Board;
        $boards = $board->get();
        return view('boards.welcome',compact('boards'));
    }
    
    public function index($id = 1){
        if(ctype_digit($id)){
        $board = Board::find($id);
            if(empty($board)){return redirect('/')->with("flash_message",__("存在しない掲示板です"));}
        $contents = Content::where('board_id',$id)->orderBy('created_at','desc')->get();
        return view('boards.show-post',['contents'=>$contents,'board'=>$board]);
        }else{
            return view('boards.welcome')->with("flash_message",__("存在しない掲示板です"));
        }
    }
    
    public function post(Request $request){
        $request -> validate([
            'board_id'=>'integer|required',
            'content'=>'required|string|max:191',
        ]);
        
        $content = new Content;
//        $content -> fill($req->all())->save();
         Auth::user()->contents()->save($content->fill($request->all()));
        
        return back();
        
    }
}
