<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if(!empty($keyword)){
            $products = Product::where('id', 'LIKE', "%$keyword%")
                ->orWhere('product_code', 'LIKE', "%$keyword%")
                ->orWhere('product_name', 'LIKE', "%$keyword%")
                ->orWhere('product_teaser', 'LIKE', "%$keyword%")
                ->orWhere('produc_content', 'LIKE', "%$keyword%")
                ->latest()->paginate(10);
        }
        else {
			$products = Product::latest()->paginate(10);
        }
        //dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::pluck('cate_name', 'id');
        return view('admin.products.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'product_name' => 'required',
            'product_teaser' => 'required',
            'produc_content' => 'required',
            'product_code' => 'required|unique:products,product_code',
            'product_price' => 'required',
			'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
        $requestData = $request->except('image');
        if ($request->hasFile('image')) {
			$image = $request->file('image');

			$filename = 'product' . '-' . time() . '.' . $image->getClientOriginalExtension();

			$location = public_path('Upload/Products');
			$request->file('image')->move($location, $filename);

			$requestData['product_image'] = $filename;
        }
        Product::create($requestData);
        return redirect('admin/products')->with('flash_message', 'Product added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::findBySlugOrFail($slug);
        return view('admin.products.show', compact('product'));
    }
    public function display($slug)
    {
        $product = Product::findBySlugOrFail($slug);
        dd($product);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = Category::pluck('cate_name', 'id');
        $product = Product::find($id);
        return view('admin.products.edit', compact('cates', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'product_name' => 'required',
            'product_teaser' => 'required',
            'produc_content' => 'required',
            'product_code' => 'required|unique:products,product_code,' . $id . 'ID',
            'product_price' => 'required',
			'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
		$requestData = $request->except('image');
        if ($request->hasFile('image')) {
			$image = $request->file('image');

			$filename = 'product' . '-' . time() . '.' . $image->getClientOriginalExtension();

			$location = public_path('Upload/Products');
			$request->file('image')->move($location, $filename);

			$requestData['product_image'] = $filename;
        }


        $product = Product::findOrFail($id);


        $product->update($requestData);
        $product->update(['product_name' => $requestData['product_name']]);
        return redirect('admin/products')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        $product->delete();
        return redirect('admin/products')->with('success', 'Product deleted!');
    }
}
