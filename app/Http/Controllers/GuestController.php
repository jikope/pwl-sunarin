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
        if(Auth::check()){
            $this->middleware('verified');
        }
        $this->category = Category::all();
    }

    public function fetchCategory(){
        return $this->category;
    }

    public function fetchNews(){
        $data = Article::where("type","publish")->join('categories','category_id','categories.id')->select('articles.id as id','image','content','title','content','articles.updated_at as date','category')->take(9)->get();
        return $data;
    }
    public function index(){
        $data = Article::where("type","publish")->take(12)->get();
        $latest = Article::join('latests','latests.article_id','articles.id')->select("articles.title");
        $category =  $this->category;

        return view("guest", compact('data','category'));
    }



    public function berita()
    {
        $data = Article::join('users','user_id','users.id')->join('categories','category_id','categories.id')->where("type","publish")->select('articles.id as id','image','content','title','content','articles.updated_at as date','category','users.name as author')->orderBy('articles.updated_at','desc')->paginate(5);
        $latest = Article::where("type","publish")->orderBy('articles.updated_at', 'desc')->take(3)->get();

        $category =  $this->category;
        return view('berita',compact('data','latest','category'));
    }

  



    public function show($id){
        $data = Article::findOrFail($id);
        return view("display", compact("data"));
    }
    public function getSugesstion($id){
        if($id==0){
        $latest = Latest::where('user_id',Auth::user()->id)->select('article_id','created_at')->orderBy('created_at', 'DESC')->distinct()->take(3)->get('article_id')->map(function($item){
            return array_values($item->toArray());
        });
        }else{
            $latest = [$id];
        }
       
        $suggestion = Http::post('http://localhost:5000/suggest', [
            'latest' => $latest,

        ]);

        $suggestions_id = $suggestion->json('recommended_news');

        $data = Article::whereIn('id',$suggestions_id)->get();
        return $data;
    }

    public function getByCategory($category){
        $data = Article::join('categories','category_id','categories.id')->join('users','user_id','users.id')->where([['category',$category],['type','publish']])->select('articles.id as id','image','content','title','content','articles.updated_at as date','category','users.name as author')->orderBy('articles.updated_at','desc')->paginate(5);
        $latest = Article::where("type","publish")->orderBy('articles.updated_at', 'desc')->take(3)->get();

        $category =  $this->category;
        return view('berita',compact('data','latest','category'));
        
    }
    public function fetchNewsByCategory($category){
        $data = Article::join('categories','category_id','categories.id')->where('category',$category)->select('articles.id as id','image','content','title','content','articles.updated_at as date','category')->orderBy('updated_at','desc')->take(3)->get();
        
        return $data;
    }
    public function search(Request $request){
        $term=$request::get('key');
        $category =  $this->category;
        $latest = Article::where("type","publish")->orderBy('articles.updated_at', 'desc')->take(3)->get();
        $data = Article::join('categories','category_id','categories.id')->where("type","publish")
                ->join('users','user_id','users.id')->where([['content','LIKE','%'.$term.'%'],['type','publish']])->select('articles.id as id', 'title', 'image', 'articles.updated_at as date', 'content', 'users.name as author')
                ->orderBy('articles.updated_at','desc')
                ->paginate(5);
        return view("berita", compact('data','category','latest'));
    }

}