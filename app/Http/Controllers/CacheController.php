<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function cache(){
        $news=Cache::remember('newsname',60*60*60,function (){
           return News::all();
        });
        return view('Cache.cache',compact('news'));
    }
}
