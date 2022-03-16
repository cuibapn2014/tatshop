<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Bill, App\Models\Payment, App\Models\Product;
use App\Models\CodeDiscount;
use Carbon\Carbon;
use App\Helper\Helper;

class BillController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$payment = bill::orderBy('id', 'desc')->get();
		$recieved = bill::where("stt", 4)->get();
		$confirm = bill::where("stt", 1)->get();
		$transfering = bill::where("stt", 3)->get();
		return view('shop.admin.bills', ['bills' => $payment, 'confirm' => $confirm, 'transfering' => $transfering, 'recieved' => $recieved]);
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
		$cart = Cart::getContent();
		$bill = new bill();
		$this->validate(
			$req,
			[
				'customer' => 'required|min:6',
				'phone' => 'required|min:10|max:10',
				'address' => 'required',
				'province' => 'required',
				'district' => 'required'
			],
			[
				'customer.required' => 'Bạn chưa nhập tên',
				'province.required' => 'Vui lòng chọn tỉnh hoặc thành phố bạn sống',
				'district.required' => 'Vui lòng chọn quận hoặc huyện bạn sống',
				'customer.min' => 'Tên có ít nhất 6 ký tự',
				'phone.required' => 'Bạn chưa nhập số diện thoại',
				'phone.min' => 'Số điện thoại không hợp lệ',
				'phone.max' => 'Số điện thoại không hợp lệ',
				'address.required' => 'Bạn chưa nhập địa chỉ',
			]
		);
		$strCode = Helper::convert_vi_to_en($req->code);
		if (count($cart) > 0) {
			$code = CodeDiscount::where("code", $strCode)->first();
			$now = Carbon::now("Asia/Ho_Chi_Minh");
			$bill->customer = $req->customer;
			if ($code != null && $code->time > 0 && $code->min < Cart::getTotal() && $code->expire > $now) {
				if (Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000) {
					$bill->total = Cart::getTotal() * (0.95 - ($code->discount / 100));
					$bill->discount = 5 + $code->discount;
				} elseif (Cart::getTotal() > 1000000) {
					$bill->total = Cart::getTotal() * (0.9 - ($code->discount / 100));
					$bill->discount = 10 + $code->discount;
				} else {
					$bill->total = Cart::getTotal() * (1 - $code->discount / 100);
					$bill->discount = $code->discount;
				}
				$code->time--;
				$code->save();
			} else {
				if (Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000) {
					$bill->total = Cart::getTotal() * 0.95;
					$bill->discount = 5;
				} elseif (Cart::getTotal() > 1000000) {
					$bill->total = Cart::getTotal() * 0.9;
					$bill->discount = 10;
				} else {
					$bill->total = Cart::getTotal();
					$bill->discount = 0;
				}
			}
			$bill->address = $req->address.", ".$req->district.", ".$req->province;
			$bill->phone = $req->phone;
			$bill->email = $req->email;
			$bill->stt = 1;
			$bill->pay = 1;
			$bill->fee = $req->fee_ship;
			$bill->save();
			foreach ($cart as $item) {
				$payment = new payment();
				$payment->id_product = $item->id;
				$payment->name = $item->name;
				$payment->image = product::find($item->id)->thumbnail;
				$payment->code_bill = bill::orderBy('id', 'desc')->first()->id;
				$payment->price = $item->price;
				$payment->qty = $item->quantity;
				$payment->attr = $item->attributes->size . "," . $item->attributes->color;
				$payment->status = 0;
				$payment->save();
			}
			$date = Carbon::parse($bill->created_at);
			$urlInvoice = "/invoice/tsi".$date->format('i').$date->format('Y').$date->format('m').$bill->id;
			Cart::clear();
			return redirect($urlInvoice)->with('success', 'Đặt hàng thành công');
		} else {
			return back()->with('danger', 'Giỏ hàng của bạn hiện chưa có sản phẩm !');
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
		$payment = payment::where('code_bill', $id)->orderBy('id', 'desc')->get();
		$box = payment::where('status', 0)->get();
		$bill = bill::find($id);
		$bill->timestamps = false;
		if ($bill->stt == 1) {
			$bill->stt = 2;
			foreach ($payment as $p) {
				if ($p->status == 0) {
					$p->status = 1;
					$product = product::find($p->id_product);
					$product->qty -= $p->qty;
					$product->sold += $p->qty;
					$product->save();
					$p->save();
				}
			}
		}
		$bill->save();
		return view('shop.admin.detailBills', ['detail' => $payment, 'bill' => $bill]);
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
		$bill = bill::find($id);
		$bill->delete();
		return back()->with('notice', 'Xóa thành công');
	}
}
