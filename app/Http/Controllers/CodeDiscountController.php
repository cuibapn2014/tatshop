<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodeDiscount, App\Models\Deal;

class CodeDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $code = CodeDisCount::all();
		return view('shop.admin.dashboard.codeDiscount',['code' => $code]);
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
        $deal = new deal();
		$this->validate($req,
		[
			'code' => 'required|min:3',
			'discount' => 'required',
			'moreTime' => 'required',
			'expired' => 'required',
			'min' => 'required',
		],
		[
			'code.required' => 'Bạn chưa nhập mã giảm',
			'min.required' => 'Bạn chưa nhập điều kiện áp dụng',
			'code.min' => 'Mã ít nhất 3 ký tự',
			'discount.required' => 'Bạn chưa nhập giá trị',
			'moreTime.requried' => 'Bạn chưa nhập lần sử dụng',
			'expired.required' => 'Bạn chưa chọn hạn sử dụng',
		]);
			$code = new CodeDisCount();
			$code->code = strtoupper($req->code);
			$code->discount = $req->discount;
			$code->time = $req->moreTime;
			$code->min = $req->min;
			$deal->expired = $code->expire = $req->expired;
			$code->save();
			$deal->save();
			return back()->with('notice','Thêm mã thành công');
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
        $code = CodeDisCount::find($id);
		if($code != null){
			$code->delete();
			return back()->with('notice','Xóa mã thành công');
		}
		return back();
    }
}
