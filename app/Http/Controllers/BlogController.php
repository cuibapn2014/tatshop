<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blog = blog::all();
		return view('shop.blog',['blog' => $blog]);
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
        $this->validate($req,
		[
			'_content' => 'required',
			'image' => 'required',
		],
		[
			'_content.required' => 'Bạn chưa nhập nội dung',
			'image.required' => 'Bạn chưa thêm link ảnh',
		]);
		$blog = new blog();
		$blog->content = $req->_content;
		$blog->image = $req->image;
		$blog->written = Auth::user()->name;
		$blog->save();
		return back()->with('notice','Đã thêm blog mới');
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
        $blog = blog::find($id);
		$blog->delete();
		return back()->with('notice','Đã xóa');
    }
}
