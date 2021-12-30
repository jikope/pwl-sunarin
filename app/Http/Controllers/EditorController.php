<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Vocab;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Http;
use App\Events\NotifSentEvent;
use App\Events\NotifCounterEvent;

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

    private function makeMsg($isAccepted,$title, $reason){
        $message = "Artikel dengan Judul ".$title." kami nyatakan";
        if($isAccepted==true){
            $message = $message." diterima, terimakasih atas kontribusi anda";
        }else{
         $message = $message." ditolak, dengan catatan ".$reason;
        }
        
        return $message;
    }

    public function action(Request $request)
    {
        
        $article = Article::findOrFail($request->article_id);
        $isAcc = false;
        
        switch ($request->action) {
            case "approve":
                $article->type = "publish";
                $pre = Http::post('http://localhost:5000/preprocess', [
                    'message' => strip_tags($article->content),
                    
                 
                ]);
                $toStore = $pre->json('text');
                Vocab::create([
                    'article_id'=>$article->id,
                    'words'=>$toStore
                ]);
                $isAcc = true;
                break;
            case "deny":
                
                $article->type = "draft";
                
        }
        $result = $article->save();
        if ($result) {
            
            $message = Notification::create([
                'user_id'=>3,
                'title'=>"artikel anda ditolak",
                'message'=>$this->makeMsg(false,$article->title,$request->message),
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
            $messages = Notification::where('user_id',3)->get();
            //dd($messages->count());
            Broadcast(new NotifSentEvent(3, $message));
            Broadcast(new NotifCounterEvent(3,$messages->count()));
            return 200;

            
        } else {
            return redirect()->route('proposal.index')->withErrors(['message' => 'Failed to change article type']);
        }
    }



    public function getPublished()
    {
        $data = Article::where('type', 'publish')->paginate(5);

        return view('editor/display', compact('data'));
    }

    public function contributorrequest(){
        $data = Article::join("categories", "categories.id", "articles.category_id")->select("title", "category", "articles.id as id", "user_id")->where([
            ["type", "draft"],
            ["user_id", Auth::user()->id]
        ])->paginate(5);
        return view("editor.display", compact('data'));
    }
}
