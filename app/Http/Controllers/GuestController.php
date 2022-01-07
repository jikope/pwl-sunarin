<?php

namespace App\Http\Controllers;

#use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Latest;
use App\Models\Category;
use Auth;
use Http;
use Request;
class GuestController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category = Category::all();
    }
    public function index(){
        $data = Article::where("type","publish")->paginate(10);
        $latest = Article::join('latests','latests.article_id','articles.id')->select("articles.title");
        $category =  $this->category;

        return view("guest", compact('data','category'));
    }



    public function berita()
    {
        $data = Article::where("type","publish")->paginate(1);
        $category =  $this->category;
        return view('berita',compact('data','category'));
    }

    public function kategori()
    {
        return view('kategori');
    }



    public function show($id){
        $data = Article::findOrFail($id);
        return view("display", compact("data"));
    }
    public function getSugesstion(){
        $latest = Latest::where('user_id',Auth::user()->id)->select('article_id','created_at')->orderBy('created_at', 'DESC')->distinct()->take(3)->get('article_id')->map(function($item){
            return array_values($item->toArray());
        });

        $suggestion = Http::post('http://localhost:5000/suggest', [
            'latest' => $latest,

        ]);

        $suggestions_id = $suggestion->json('recommended_news');

        $data = Article::whereIn('id',$suggestions_id)->paginate(10);
        return view("guest", compact('data'));
    }

    public function getByCategory($category){
        $data = Article::join('categories','category_id','categories.id')->where('category',$category)->select('articles.id as id', 'title')->paginate(5);
        $category =  $this->category;

        return view("guest", compact('data','category'));
    }

    public function search(Request $request){
        $term=$request::get('key');
        $category =  $this->category;
        $data = Article::join('categories','category_id','categories.id')->where("type","publish")->where('content','LIKE','%'.$term.'%')->select('articles.id as id', 'title')
                      ->paginate(10);
        return view("berita", compact('data','category'));
    }

}
