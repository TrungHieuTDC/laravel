<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CommentCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->commnet = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->save();
        $article = Article::find($request->article_id);
        $user = User::find(Auth::id());
        $cmt = Comment::find($request->article_id);
        $data= ['id'=>$comment->article_id, 'article'=>$article,'comments'=>$cmt,'user'=>$user];
        return redirect(route('auth.detail.id',$request->article_id))->with('data',$data);
    }

    // add comment
    public function addComment($comment,$user_id,$article_id){
        $data = DB::table('comments')->insert(['comment'=>$comment,'user_id' => $user_id,'article_id'=>$article_id]);
    }

    // getComment
    public function getComment($id){
        $data = DB::table('comments')
        ->join('users','users.id','=','comments.user_id')
        ->get()
        ->where('article_id','=',$id);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
