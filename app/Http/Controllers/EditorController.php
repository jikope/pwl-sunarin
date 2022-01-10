<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Proposal;
use App\Models\User;
use App\Models\Vocab;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Http;
use App\Events\NotifSentEvent;
use App\Events\NotifCounterEvent;
use URL;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:editor','verified']);
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
        $author = User::findOrFail($article->user_id);
        
        switch ($request->action) {
            case "approve":
                // Untuk artikel dari contributor
                if ($article->type == 'completed') {
                  $pre = Http::post('http://localhost:5000/preprocess', [
                      'message' => strip_tags($article->content),
                  ]);
                    $article->type = "publish";
                    $toStore = $pre->json('text');
                    Vocab::create([
                        'article_id' => $article->id,
                        'words' => $toStore
                    ]);
                    
                // Untuk proposal dari user
                } else if($article->type == 'proposal') {
                    // Tidak diupdate karena artikel akan dihapus
                    // $article->proposal()->update([
                    //     'message' => $request->message,
                    //     'status' => 'approved'
                    // ]);
                    if ($author->roles[0]->name == "user" && $author->articles->count() == 1 && $author->articles[0]->type == 'proposal') {
                        $author->syncRoles(['contributor']);
                    }
                    $article->proposal()->delete();
                    $article->delete();
                    $this->MailHelper($author->name, "selamat anda menjadi contributor. " + $author, $author);
                }

                $isAcc = true;
                break;
            
            case "deny":
                if ($article->type == 'completed') {
                  $article->type = "draft";
                } else if ($article->type == 'proposal') {
                  // Tidak diupdate karena artikel akan dihapus
                  // $article->proposal()->update([
                  //     'message' => $request->message,
                  //     'status' => 'denied'
                  // ]);
                  $this->MailHelper($author->name, "Permohonan anda untuk menjadi contributor ditolak. " + $request->message, $author);
                  $article->delete();
                }
                break;                    
        }
        return redirect()->route('contributor-request');
        // Line code kebawah tidak dieksekusi
        $result = $article->save();

        if ($result) {
            $message = Notification::create([EditorController
                'user_id'=>$article->user_id,
                'title'=>"artikel anda ditolak",
                'message'=>$this->makeMsg($isAcc,$article->title,$request->message),
                'url'=>URL::to('/contributor/news/draft/'),
                'isRead'=>'0',
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
            $messages = Notification::where('user_id',$article->user_id)->get();
            //dd($messages->count());
            Broadcast(new NotifSentEvent($article->user_id, $message));
            Broadcast(new NotifCounterEvent($article->user_id,$messages->count()));
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

    public function contributorrequest()
    {
        $data = Article::whereHas('proposal', function ($q) {
            $q->where('status', 'active')->where('editor_id', Auth::user()->id);
        })->paginate(5);

        return view("editor.display", compact('data'));
    }
}
