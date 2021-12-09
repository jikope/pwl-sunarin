<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(){
        $categories =["ini", "itu", "anu"];
        $types =["ini", "itu", "anu"];
        return view("insert",compact('categories'));
    }

    public function store(Request $request){
        $data = $request->except("_token");
        $data->id = 1;
        dd($data);
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
