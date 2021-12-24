<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class GuestController extends Controller
{
    public function index(){
        $data = Article::where("type","publish")->paginate(10);
        $latest = Article::join('latests','latests.article_id','articles.id')->select("articles.title");

    return view("guest", compact('data'));
    }


}
