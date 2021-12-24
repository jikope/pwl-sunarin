<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Article;
use App\Models\Category;

class ContributorController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view("contributor.insert",compact('categories'));
    }

    public function draft(){
        $data = Article::join("categories","categories.id","articles.category_id")->select("title","category","articles.id as id","user_id")->where([
            ["type","draft"],
            ["user_id",Auth::user()->id]
        ])->paginate(1);
        return view("contributor.display",compact('data'));
    }

    public function published(){
        $data = Article::join("categories","categories.id","articles.category_id")->select("title","category","articles.id as id","user_id")->where([
            ["type","publish"],
            ["user_id",Auth::user()->id]
        ])->paginate(1);
        return view("contributor.display",compact('data'));
    }

    public function complete(){
        $data = Article::join("categories","categories.id","articles.category_id")->select("title","category","articles.id as id","user_id")->where([
            ["type","complete"],
            ["user_id",Auth::user()->id]
        ])->paginate(1);
        return view("contributor.display",compact('data'));
    }

    public function store(Request $request){
        
        if($request->hasFile('image')){
            $data = $request->except('_token');
            $data["type"]="draft";
            $data["user_id"] = Auth::user()->id;
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $originalImage = $request->file('image');
            $originalImage->move(public_path().'/images/informations/', $fileNameToStore);
            $data["image"]= '/images/informations/'.$fileNameToStore;
            
            $info = Article::create($data);
            if(!is_null($info)) {
                return redirect()->route('contribut.article')->with('success','Success! data berhasil ditambahkan');
            }else{
                return redirect()->route('patient')->with('failed','Alert! terjadi kesalahan');
            }
        }
    }
    public function edit($id){
        $categories = Category::all();
        $data= Article::find($id);
        return view("contributor.insert", compact('data','categories'));
    }

    public function destroy($id){
        $deletedRows = Article::where([
            ['id', $id],
            ['user_id',Auth::user()->id]
            ])->delete();
        return redirect()->route('patient')->with('success', 'data berhasil dihapus');
        }

    public function setcomplete($id){
        $publishedRows = Article::where([
            ['id', $id],
            ['user_id',Auth::user()->id]
            ])->update(["type"=>"complete"]);
        return redirect()->route('article.index')->with('success', 'data berhasil dihapus');
        }

    }

