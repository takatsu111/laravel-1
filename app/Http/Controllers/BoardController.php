<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Board;
use App\Category;
use App\Content;
use App\User;


class BoardController extends Controller
{
    public function test(){
        $user = User::find(6);
        $content = Content::find(1);
        $userid = Auth::id();
        return view("boards.test",compact('user','content','userid'));
    }
    
    
    public function welcome(){
        $board = new Board;
        $boards = $board->get();
        return view('boards.welcome',compact('boards'));
    }
    
    public function index($id = 1){
        if(ctype_digit($id)){
        $board = Board::find($id);
            if(empty($board)){return redirect('/')->with("flash_message",__("存在しない掲示板です"));}
        $userid = Auth::id();
        return view('boards.show-post',['board'=>$board,'userid'=>$userid]);
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
    
    public function new(){
        $categories = Category::get();
        return view('boards.create',compact('categories'));
    }
    
    public function create(Request $request){
        $request -> validate([
            'name'=>'required|string|max:191',
            'category_id'=>'required|integer',
        ]);
        
        $board = new Board;
        $board -> fill($request->all())->save();
        $lastId = $board -> id;
        $board =  Board::find($lastId);
        $board -> categories() -> attach($request->input('category_id'));
    }
    
    public function good(Request $request){
        $request -> validate([
            'function'=>'required|string',
            'content_id'=>'required|integer'
        ]);
        
        if($request->input('function')=='insert'){
            Auth::user()->contentsOfGoods()->attach($request->input('content_id'));
        }else{
            Auth::user()->contentsOfGoods()->detach($request->input('content_id'));
        }
        
        return back();
    }
}
