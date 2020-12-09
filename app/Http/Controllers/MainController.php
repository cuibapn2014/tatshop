<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Carbon\Carbon;
use App\image;
use App\attribute;
use App\User;
use Cart;
use Auth;
use App\payment;
use App\bill;
use App\reply;

class MainController extends Controller
{
    //
	public function index(){
		$total = Cart::getTotal();
		$product = product::orderBy('id','desc')->take(20)->get();
		return view('shop.index',['product' => $product,'total' => $total]);
	}
	
	public function getProduct(){
		$product = product::orderBy('id','desc')->paginate(30);
		return view('shop.product',['product' => $product]);
	}
	public function getChiTiet($id, $link){
		Carbon::setLocale('vi');
		$product = product::find($id);
                $n = product::all();
                if(count($n) > 1){
                        $product2 = product::where('id','!=',$id)->inRandomOrder()->limit(10);
                }else{
                        $product2 = $product;
                }
		$reply = reply::where('reply',$id)->orderBy('id','desc')->get();
		return view('shop.detailPro',['product' => $product,'random' => $product2,'reply' => $reply]);
	}
	public function postChiTiet(request $req, $id){
		$reply = new reply();
		if(Auth::check()){
		$this -> validate($req,
		[
			'comments' => 'required',
		],
		[
			'comments.required' => 'Bạn chưa nhập đánh giá',
		]);
		$reply->idUser = Auth::user()->id;
		$reply->reply = $id;
		$reply->content = $req->comments;
		$reply->save();
		return back()->with('notice1','Đã thêm đánh giá mới');
		}else{
			return back()->with('danger1','Bạn chưa đăng nhập');
		}
	}
	
	public function getAddCart($id){
		if(isset($_GET['color'])){
			if($_GET['color'] == ""){
				return back()->with('danger','Bạn chưa chọn màu sản phẩm');
			}
		}else{
			return back()->with('danger','Bạn chưa chọn màu sản phẩm');
		}
		$qty = $_GET['qty'];
		$product = product::find($id);
		$price = $product->price * (1-($product->discount)/100);
		Cart::add(array(
		'id' => $id,
		'name' => $product->title,
		'price' => $price,
		'quantity' => $qty,
		'attributes' => array(
			'size' => $_GET['size'],
			'color' => $_GET['color'],
			'img' => $product->thumbnail,
		),
		'associatedModel' => $id,
		));
		return redirect('cart');
	}
	
	public function getCart(){
		$cartItem = Cart::getContent();
		return view('shop.cart',['cart' => $cartItem]);
	}
	public function getRemoveCart($id){
		Cart::remove($id);
		return back();
	}
	public function postCart(request $req){		
		$cart = Cart::getContent();
		$bill = new bill;
                $this->validate($req,
			[
				'customer' => 'required|min:6',
				'phone' => 'required|min:10|max:10',
				'address' => 'required|min:20',
			],
			[
				'customer.required' => 'Bạn chưa nhập tên',
				'customer.min' => 'Tên có ít nhất 6 ký tự',
				'phone.required' => 'Bạn chưa nhập số diện thoại',
				'phone.min' => 'Số điện thoại không hợp lệ',
				'phone.max' => 'Số điện thoại không hợp lệ',
				'address.required' => 'Bạn chưa nhập địa chỉ',
				'address.min' => 'Địa chỉ không đầy đủ',
			]);
			if(count($cart) > 0){
				$bill->customer = $req->customer;
                                if(Cart::getTotal() >= 200000 && Cart::getTotal() <= 500000){
		$bill->total = Cart::getTotal()*0.95;
                }elseif(Cart::getTotal() > 500000){
                $bill->total = Cart::getTotal()*0.9;
                }else{
                $bill->total = Cart::getTotal();
                }
		$bill->address = $req->address;
		$bill->phone = $req->phone;
                $bill->email = $req->email;
		$bill->stt= "Chờ xác nhận";
			$bill->save();
		foreach($cart as $key => $item){
			$payment = new payment();
			$payment->customer = $req->customer;
			$payment->id_product = $item->id;
			$payment->name = $item->name;
			$payment->code_bill = bill::orderBy('id','desc')->first()->id;
			$payment->price = $item->price;
			$payment->qty = $item->quantity;
			$payment->attr = $item->attributes->size.",".$item->attributes->color;
			$payment->status = 0;
			$payment->save();
		}
			Cart::clear();
			return back()->with('notice','Đặt hàng thành công');
			}else{
				return back()->with('danger','Bạn chưa có sản phẩm trong giỏ hàng');
			}
	}
	
	public function getAdd($id){
		
		$product = product::find($id);
		$price = $product->price * (1-($product->discount)/100);
		Cart::add(array(
		'id' => $id,
		'name' => $product->title,
		'price' => $price,
		'quantity' => 1,
		'attributes' => array(
			'size' => 'M',
			'color' => 'Mặc định',
			'img' => $product->thumbnail,
		),
		'associatedModel' => $id,
		));
		return redirect('cart');
	}
	public function getSearch(){
		return back();
	}
	public function postSearch(request $req){
		$keyword = $req->search;
		if($keyword == ""){
			return back();
		}else{
			$product = product::where('title','like',"%$keyword%")->orWhere('content','like','%$keyword%')->get();
			return view('shop.search',['product' => $product]);
		}
	}
}
