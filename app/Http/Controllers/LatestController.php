<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latest;
use Auth;
class LatestController extends Controller
{
    public function insert($id){
        $late = Latest::where("user_id",Auth::user()->id)->latest()->first();
        if($late!=null){
            if($late->article_id != $id){
                Latest::create(["user_id"=>Auth::user()->id, "article_id"=>$id]);
                //set session update
            }
        }else{
            Latest::create(["user_id"=>Auth::user()->id, "article_id"=>$id]);
        }
        return redirect()->route('display.article',[$id]);
    }
}
