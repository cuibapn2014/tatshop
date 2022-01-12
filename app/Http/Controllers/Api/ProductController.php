<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = product::with([
            'subcategory',
            'subcategory.category',
            'image',
            'attr',
            'comment',
            'comment.user'
        ])->orderBy("id", "desc")->paginate(
            20,
            [
                'id',
                'title',
                'content',
                'qty',
                'price',
                'thumbnail',
                'discount',
                'sold',
                'id_subcategory',
            ]
        );

        return $product;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
        return $product->with([
            'subcategory',
            'subcategory.category',
            'image',
            'attr',
            'comment',
            'comment.user'
        ])->find($product->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
        return $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
        $product->delete();
    }

    public function search($keyword)
    {
        return product::with([
            'subcategory',
            'subcategory.category',
            'image',
            'attr',
            'comment',
            'comment.user'
        ])->where("title", "like", "%$keyword%")->orderBy("id", "desc")->get();
    }
    
    public function getAll()
    {
        //
        $product = product::with([
            'subcategory',
            'subcategory.category',
            'image',
            'attr',
            'comment',
            'comment.user'
        ])->orderBy("id", "desc")->get(
            [
                'id',
                'title',
                'content',
                'qty',
                'price',
                'thumbnail',
                'discount',
                'sold',
                'id_subcategory',
            ]
        );//->paginate(20)->get();

        return $product;
    }
}
