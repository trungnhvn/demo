<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::with('childs')->where('cate_parent',0)->paginate(10);
        return view('admin.categories.index', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::with('childs')->where('cate_parent',0)->select('cate_name', 'id')->get(); //Get list of category to fill-out into the drop-list Cate_parent
        $category = new Category();
        return view('admin.categories.create', compact('cates', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cate_name'=>'required',
            'cate_parent'=>'required',
            ]);
        $cate = new Category();
        $cate->cate_name = $request->cate_name;
        $slug = Str::slug($request->cate_name,'-');
        $cate->cate_slug = $slug;
        $cate->cate_parent = $request->cate_parent;
        $cate->save();
        return redirect('/admin/categories')->with('success', 'Category saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = Category::with('childs')->where('cate_parent',0)->select('cate_name', 'id')->get();
        $category = Category::findorFail($id);
        return view('admin.categories.edit', compact('cates', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cate_name'=>'required',
            'cate_parent'=>'required',
            ]);
        $cate = Category::findOrFail($id);
        $cate->cate_name = $request->cate_name;
        $slug = Str::slug($request->cate_name,'-');
        $cate->cate_slug = $slug;
        $cate->cate_parent = $request->cate_parent;
        $cate->save();
        return redirect('/admin/categories')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate= Category::findOrFail($id);
        $cate->products()->delete();
        $cate->delete();

        return redirect('/categories')->with('success', 'Category deleted!');
    }
}
