<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Directer;
use App\Models\News;
use App\QueryFilter\about;
use App\QueryFilter\Id;
use App\QueryFilter\new_name;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FirstController extends Controller
{
    public function reg(){
       return view('index');
    }
    public function admin(){
        return view('admin');
    }
    public function registered(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin');
        }
        return redirect()->route('reg')->with('danger','Email or password');
    }
    public function show(){
        return view('myname.appgurad');
    }
    public function see(){
        return view('myname.examople');
    }



//    Pipelines


    public function new_index(){
        $news=News::orderBy('id','desc');

        $news=app(Pipeline::class)
            ->send($news)
            ->through([
                Id::class,
                new_name::class,
                about::class
            ])->thenReturn();
        dd($news->get()) ;
    }
}
