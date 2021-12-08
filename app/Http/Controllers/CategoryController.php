<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;
use App\Category;
use App\Product;
use App\Subcategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cate = category::all();
		if(!Cache::has('product'))
		Cache::add('product',$cate);
		$getCache = Cache::get('product');
		return view('shop.product',['cate' => $getCache]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $category = new category();
		$subcategory = new subcategory();
		if($req->category != null){
			$category->category = $req->category;
			$category->save();
		}
		if($req->subcategory != null){
			$subcategory->id_category = $req->old_category;
			$subcategory->sub_category = $req->subcategory;
			$subcategory->save();
		}

		return back()->with('notice','Thêm mới thành công');
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
		$product = product::where('id_category',$id)->orderBy('id','desc')->paginate(30);
		return view('shop.category',['product' => $product]);
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
        $cate = category::find($id);
		$cate->delete();
		return back()->with('notice','Đã xóa danh mục sản phẩm');
    }
}
