<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Auth;

class ArticleController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view("template.template", compact('categories'));
    }

    public function viewcontrib()
    {
        $data = Article::join("categories", "categories.id", "articles.category_id")->select("title", "category", "articles.id as id")->where("type", "!=", "proposal")->paginate(5);
        return view("contributor.display", compact('data'));
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $data = $request->except('_token');
            $data["type"] = "draft";
            $data["user_id"] = Auth::user()->id;
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $originalImage = $request->file('image');
            $originalImage->move(public_path() . '/images/informations/', $fileNameToStore);
            $data["image"] = '/images/informations/' . $fileNameToStore;

            $info = Article::create($data);
            if (!is_null($info)) {
                return redirect()->route('contribut.article')->with('success', 'Success! data berhasil ditambahkan');
            } else {
                return redirect()->route('patient')->with('failed', 'Alert! terjadi kesalahan');
            }
        }
    }

    public function edit($id)
    {
        $categories = Category::all();
        $data = Article::find($id);
        return view("contributor.insert", compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Article::find($id);
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $originalImage = $request->file('image');
            $originalImage->move(public_path() . '/images/informations/', $fileNameToStore);
            $data["image"] = '/images/informations/' . $fileNameToStore;
        } else {
            $data["image"] = $post['image'];
        }
        $info = $post->update($data);
        if (!is_null($info)) {
            return redirect()->route('contributor.draft.index')->with('success', 'Success! data berhasil diupdate');
        } else {
            return redirect()->route('contributor.draft.index')->with('failed', 'Alert! terjadi kesalahan');
        }
    }

    public function show($id)
    {
        $data = Article::find($id);
        return view("display", compact("data"));
    }

    public function destroy($id)
    {
        $deletedRows = Article::where('id', $id)->delete();
        return redirect()->route('patient')->with('success', 'data berhasil dihapus');
    }

    public function publish($id)
    {
        $publishedRows = Article::where('id', $id)->update(["type" => "publish"]);
        return redirect()->route('contribut.article')->with('success', 'data berhasil dihapus');
    }

    public function setcomplete($id)
    {
        $publishedRows = Article::where('id', $id)->update(["type" => "complete"]);
        return redirect()->route('article.index')->with('success', 'data berhasil dihapus');
    }

    public function toDraft($id)
    {
        $publishedRows = Article::where('id', $id)->update(["type" => "draft"]);
        return redirect()->route('contribut.article')->with('success', 'data berhasil dihapus');
    }


    public function getByUser()
    {
        $data = Article::where('user_id', Auth::user()->id)->paginate(5);
        return $data;
        //return view('', compact('data'));
    }

    public function getCompleted()
    {
        $data = Article::where('type', 'completed')->paginate(5);
        return $data;
    }

    public function getPublished()
    {
        $data = Article::where('type', 'published')->paginate(5);
        return $data;
    }
}
