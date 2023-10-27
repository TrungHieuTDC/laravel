<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category')->with('category', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addcategory');
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
            'category_name' => 'required',
        ]);

        $category = new Category($request->all());
        $category->save();
        return redirect(route('category.index'));
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
    public function edit($id_categories)
    {
        $category = DB::table('categories')->where('id_categories','=',$id_categories)->get();
        if (!$category) {
            return back()->with('error', 'Category not found.');
        }
        return view('admin.edit', compact('category'));
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
        echo $id;
        $category = Category::where('id_categories','=',$id);
        if (!$category) {
            return back()->with('error', 'Category not found.');
        }
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $category->update(['name'  => $request->name]);
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_categories)
    {
       
        $category = Category::where('id_categories',$id_categories);
        // print_r($category);
        if (!$category) {
            return back()->with('error', 'Category not found.');
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }

    // hien thi ta ca danh muc
    public function getAllCategory() {
        $data = DB::table('categories')->get();
        return $data;
    }

    public function getAllCategoryID($id) {
        $data = DB::table('categories')->where('id_categories','=',$id)->get();
        return $data;
    }
}
