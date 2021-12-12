<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function create(){
        $categories =["ini", "itu", "anu"];
        $types =["ini", "itu", "anu"];
        return view("insert",compact('categories'));
    }

    public function store(Request $request){
        $data = $request->except("_token");
        $data["user_id"] = 1;
        dd($data);
        Article::create($data);
        
    }

    public function edit(){
        
    }

    public function update(){

    }

    public function delete(){
        
    }

    public function publish(){

    }

}
