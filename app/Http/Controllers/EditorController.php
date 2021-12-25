<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:editor']);
    }

    public function proposals()
    {
        $data = Article::join("categories", "categories.id", "articles.category_id")
            ->select("title", "category", "articles.id as id", "user_id")
            ->where([
                ["type", "complete"]
            ])->paginate(1);

        return view('editor/display', compact('data'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('editor.show', compact('article'));
    }


    public function action(Request $request)
    {
        $article = Article::findOrFail($request->article_id);

        switch ($request->action) {
            case "approve":
                $article->type = "publish";
                break;
            case "deny":
                $article->type = "complete";
                break;
        }

        if ($article->save()) {
            return redirect()->route('proposal.index');
        } else {
            return redirect()->route('proposal.index')->withErrors(['message' => 'Failed to change article type']);
        }
    }

    public function getPublished()
    {
        $data = Article::where('type', 'publish')->paginate(5);

        return view('editor/display', compact('data'));
    }
}
