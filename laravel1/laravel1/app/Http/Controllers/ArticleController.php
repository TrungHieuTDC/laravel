<?php
    

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//session_start();
//session_destroy();



class ArticleController extends Controller
{
    public function mostComment()
    {
        $data =  DB::table('articles')
        ->select('articles.*', DB::raw('COUNT(comments.id) as comment_count'))
        ->leftJoin('comments', 'articles.id', '=', 'comments.article_id')
        ->groupBy('articles.id')
        ->orderBy('comment_count', 'desc')
        ->paginate(3);
        return view('auth.mostComment')->with('data',$data);
    }
    public function changePassword(Request $request, $id)
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        $inputPassword = $request->input('old_password');
        $storedPassword = $user->password;
        
        if (Hash::check($inputPassword, $storedPassword) && $request->new_password != '' && $request->new_password == $request->repassword) {
            $userChange = User::find($id);
            $userChange->password = Hash::make($request->new_password);
            $userChange->save();
            echo " <script>alert('Doi mat khau thanh cong')</script>";
            // return view('viewuser'.$id);
            return redirect("/auth/home-1");
        } else {
            return redirect("/viewuser/".$id);
        
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('admin.articles.article')->with('article', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        // print_r($category);
         return view('admin.articles.addarticle')->with('categories',$category);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'img' => 'required',
            
        ]);
       
        $file = $request->file('img');
        $fileName = time() . $file->getClientOriginalName();
        $file->move('images/', $fileName);
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->img = $fileName;
        $article->id_author = $request->id_author;       
        $article->category_id = $request->category_id;
        $article->save();
        return redirect(route('article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = DB::table('comments')
        ->where('id','=',$id)->get();
        $article = Article::find($id);
        $user = User::find(Auth::id());
        $userAll = User::all();
        if ($article == null) {
            return view('auth.404');
        }else{

            return view('auth.detail',['article'=>$article,'comments'=>$comment,'user'=>$user,'userAll'=>$userAll]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $article = Article::find($id);
        if (!$article) {
            return back()->with('error', 'article not found.');
        }
        return view('admin.articles.edit', ['article'=>$article,'categories'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return back()->with('error', 'article not found.');
        }
        $request->validate([
            'title' => 'required|max:255',
        ]);
       if (empty($request->image)){
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->category_id = $request->input('category_id');
        $article->save();
        return redirect()->route('article.index')->with('success', 'article updated successfully.');
       }
       else {
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->category_id = $request->input('category_id');
        $article->img = $request->input('image');
        $article->save();
        return redirect()->route('article.index')->with('success', 'article updated successfully.');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return back()->with('error', 'article not found.');
        }
        $article->delete();
        return redirect()->route('article.index')->with('success', 'article deleted successfully.');
    }





    
    // Home ---> home1
    public function DisplayHome1()
    {
        $data = DB::table('articles')
        ->join('categories','categories.id_categories','=','articles.category_id')
        ->get();
       // print_r($data);
        return view ('auth.home-1',compact('data'));
    }

    public function getArticleDESC(){
        $data = DB::table('articles')->join('categories','categories.id_categories','=','articles.category_id')
        ->orderBy('articles.id','DESC')
        ->paginate(2);
        return view('auth.featurednew',compact('data'));
    }

    // hien thi bai viet theo danh muc
    public function DisplayArticle_Category($id){
      
        $data = DB::table('articles')->where('category_id','=',$id)
        ->join('categories','categories.id_categories','=','articles.category_id')
        ->orderBy('articles.category_id','DESC')
        ->paginate(5);
       
        return view('auth.search',compact('data'));
    }

    public function DisplayArticleCategory($id,$quanlity){
        $data = DB::table('articles')->where('category_id','=',$id)
        ->join('categories','categories.id_categories','=','articles.category_id')
        ->orderBy('articles.category_id','DESC')
        ->skip(0)->take(4)
        ->get();
       return $data;
    }
    // lay bai viet theo so luong moi nhat
    public function getArticle_News($quanlity)
    {
        $data = DB::table('articles')
        ->join('categories','categories.id_categories','=','articles.category_id')
        ->orderBy('articles.id','DESC')
        ->skip(0)->take(5)
        ->get();
        return $data;
    }

     // Tim kiem article
     public function Search_Article(Request $request){
        $data = DB::table('articles')
        -> join('categories','categories.id_categories','=','articles.category_id')
        ->where ('articles.title','like','%'.$request->search.'%')
        ->orwhere('articles.content','like', '%'.$request->search.'%')
        ->orwhere('categories.name','like', '%'.$request->search.'%')
        ->paginate(2);
        $search = $request->search;
        return view('auth.search',compact('data','search'));
    }


    // suat san pham chung tac gia
    public function articlesAuthor($idAuthor){
        $data = DB::table('articles')
        ->select('articles.id','articles.title','articles.img')
        ->join('authors','authors.id','=','articles.id_author')
        ->where('authors.id','=',$idAuthor)->take(2)
        ->get();
        return $data;
    }

    public function findArticleID($id){
        $data = DB::table('articles')
        ->where('articles.id','=',$id)
        ->get();
        return $data;
    }




}
