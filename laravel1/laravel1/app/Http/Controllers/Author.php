<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class Author extends Controller
{
    //
    public function getAllAuthor()
    {
        $data = DB::table('authors')->get();
        return $data;
    }

    public function DeleteAuthor($id)
    {
        $data = DB::table('authors')->where('id','=',$id)->delete();
        return view('admin.author');
    }

    public function getAuthorID($id) {
        if (count(DB::table('authors')->where('id','=',$id)->get()) == 0)
        {
            return redirect("admin/getAllAuthor");
        }
        else{
            $data = DB::table('authors')->where('id','=',$id)->get();
            return view('admin.editAuthor',compact('data'));
        }
        
    }

    public function editAuthor($id,Request $request){
        $data = DB::table('authors')->where('id','=',$id)->update(['name' => $request -> name, 'bio' => $request -> bio]);
        return view ('admin.author');
    }

    // add author
    public function addAuthor(Request $request)
    {
        $data = DB::table('authors')->insert(['name' => $request -> name,'bio' => $request -> bio]);
        return view('admin.author');
    }

    //tim tac gia theo ma bai viet
    public function searchAuthorIdArticles($id){
        $data = DB::table('authors')->select('authors.id','authors.name','authors.bio')
        ->join('articles','articles.id_author','=','authors.id')
        ->get();
        return $data;
    }
}
