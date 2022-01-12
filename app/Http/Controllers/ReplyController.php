<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reply;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reply = reply::all();
		return view('shop.admin.dashboard.comments',['reply' => $reply]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req, $id)
    {
        //
        $reply = new reply();
		if(Auth::check()){
		$this -> validate($req,
		[
			'star' => 'required',
			'comments' => 'required',
		],
		[
			'star.required' => 'Bạn chưa bình chọn',
			'comments.required' => 'Bạn chưa nhập đánh giá',
		]);
		$reply->idUser = Auth::user()->id;
		$reply->reply = $id;
		$reply->content = $req->comments;
        $reply->vote = $req->star;
		$reply->save();
		return back()->with('notice1','Đã thêm đánh giá mới');
		}else{
			return back()->with('danger1','Bạn chưa đăng nhập');
		}
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
        $reply = reply::find($id);
		$reply->delete();
		return back();
    }
}
