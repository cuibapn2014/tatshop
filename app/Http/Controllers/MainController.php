<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\product;
use Carbon\Carbon;
use App\image, App\attribute;
use App\User;
use Cart;
use Auth;
use App\payment, App\bill;
use App\blog, App\_like, App\reply;
use App\code_discount, App\deal;
use App\category ,App\subcategory;

class MainController extends Controller
{
    //
	public function index(){
		$now = Carbon::now("Asia/Ho_Chi_Minh");
		$total = Cart::getTotal();
		$mostBuy = product::orderBy("sold","desc")->take(10)->get();
		$sale = product::where("discount",">",0)->orderBy("discount","desc")->take(10)->get();
		$comment = reply::where("vote",">=",3)->take(10)->get();
		$blog = blog::take(10)->get();
		$product = product::orderBy('id','desc')->take(30)->get();
		$filters = category::all();
		$visited = session('product');
		$deal = deal::where("expired",">",$now)->orderBy('expired','desc')->get();
		$code = code_discount::where("expire",">",$now)->orderBy('expire','desc')->get();
		return view('shop.index',['product' => $product,'total' => $total,'mostBuy' => $mostBuy, 'sale' => $sale, 'comment' => $comment,'blog' => $blog,'visited' => $visited, 'deal' => $deal, 'code' => $code,'filters' => $filters]);
	}
	
	public function getProduct(){
		$now = Carbon::now("Asia/Ho_Chi_Minh");
		$mostBuy = product::orderBy("sold","desc")->take(10)->get();
		$sale = product::where("discount",">",0)->orderBy("discount","desc")->take(10)->get();
		$comment = reply::where("vote",">=",3)->take(10)->get();
		$blog = blog::take(10)->get();
		$visited = session('product');
		$cate = category::all();
		$filters = category::all();
		$deal = deal::where("expired",">",$now)->orderBy('expired','desc')->get();
		$code = code_discount::where("expire",">",$now)->orderBy('expire','desc')->get();
		return view('shop.product',['cate' => $cate,'visited' => $visited, 'mostBuy' => $mostBuy, 'sale' => $sale, 'comment' => $comment,'blog' => $blog, 'deal' => $deal, 'code' => $code,'filters' => $filters]);
	}

	public function getCategory($id){
		$now = Carbon::now("Asia/Ho_Chi_Minh");
		$mostBuy = product::orderBy("sold","desc")->take(10)->get();
		$sale = product::where("discount",">",0)->orderBy("discount","desc")->take(10)->get();
		$comment = reply::where("vote",">=",3)->take(10)->get();
		$blog = blog::take(10)->get();
		$visited = session('product');
		$title = category::find($id);
		$product = product::where('id_category',$id)->orderBy('id','desc')->paginate(30);
		$filters = category::all();
		$deal = deal::where("expired",">",$now)->orderBy('expired','desc')->get();
		$code = code_discount::where("expire",">",$now)->orderBy('expire','desc')->get();
		return view('shop.category',['title' => $title,'product' => $product, 'visited' => $visited, 'mostBuy' => $mostBuy, 'sale' => $sale, 'comment' => $comment,'blog' => $blog,'deal' => $deal, 'code' => $code,'filters' => $filters]);
	}

	public function getChiTiet($id, $link){
		Carbon::setLocale('vi');
		$product = product::find($id);
		$check = 0;
		if(session()->has('product') && $product != null){
			foreach(session('product') as $pro){
				if($pro['id'] != $product->id){
					$check = 0;
				}else{
					$check = 1;
					break;
				}
			}
			if($check == 0){
				session()->push('product',['id' => $product->id,'item' => $product]);
			}
		}else if($product != null){
			session()->put('product',[['id' => $product->id,'item' => $product]]);
		}
            $n = product::all();
            if(count($n) > 1){
                    $product2 = product::where('id','!=',$id)->inRandomOrder()->limit(10);
            }else{
                     $product2 = $product;
            }
		$visited = session('product');
		$relate = product::where('id_category',$product->id_category)->orWhere('id_subcategory',$product->id_subcategory)->orderBy('id','desc')->take(10)->get();
		$reply = reply::where('reply',$id)->orderBy('id','desc')->get();
		return view('shop.detailPro',['product' => $product,'random' => $product2,'reply' => $reply,'relate' => $relate,'visited' => $visited]);
	}
	public function postChiTiet(request $req, $id){
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
		$bill = new bill();
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
				$code = code_discount::where("code",$req->code)->first();
				$now = Carbon::now("Asia/Ho_Chi_Minh");
				$bill->customer = $req->customer;
				if($code != null && $code->time > 0 && $code->min < Cart::getTotal() && $code->expire > $now){
           			if(Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000){
						$bill->total = Cart::getTotal()*(0.95 - ($code->discount/100));
						$bill->discount = 5 + $code->discount;
                	}elseif(Cart::getTotal() > 1000000){
               			$bill->total = Cart::getTotal()*(0.9 - ($code->discount/100));
						$bill->discount = 10 + $code->discount;
              		}else{
						$bill->total = Cart::getTotal()*(1 - $code->discount/100);
						$bill->discount = $code->discount;
					  }
				}else{
					if(Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000){
						$bill->total = Cart::getTotal()*0.95;
						$bill->discount = 5;
               		}elseif(Cart::getTotal() > 1000000){
               			$bill->total = Cart::getTotal()*0.9;
						$bill->discount = 10;
                	}else{
               		 	$bill->total = Cart::getTotal();
						$bill->discount = 0;
                	}
				}
					$bill->address = $req->address;
					$bill->phone = $req->phone;
					$bill->email = $req->email;
					$bill->stt= 1;
					$bill->pay = 1;
					$bill->save();
				foreach($cart as $item){
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
				return back()->with('success','Đặt hàng thành công');
			}else{
				return back()->with('danger','Giỏ hàng của bạn hiện chưa có sản phẩm !');
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
	public function postSearch(Request $req){
		$filters = category::all();
		$mostBuy = product::orderBy("sold","desc")->take(10)->get();
		$sale = product::where("discount",">",0)->orderBy("discount","desc")->take(10)->get();
		$comment = reply::where("vote",">=",3)->take(10)->get();
		$blog = blog::take(10)->get();
		$keyword = $req->search;
		if($keyword == ""){
			return back();
		}else{
			$product = product::where('title','like',"%$keyword%")->orWhere('content','like',"%$keyword%")->orderBy('id','desc')->get();
			return view('shop.search',['product' => $product,'keyword' => $keyword,'mostBuy' => $mostBuy, 'sale' => $sale, 'comment' => $comment,'blog' => $blog,'filters' => $filters]);
		}
	}

	public function getBlog(){
		$blog = blog::all();
		$mostBuy = product::orderBy("sold","desc")->take(10)->get();
		$sale = product::where("discount",">",0)->orderBy("discount","desc")->take(10)->get();
		$comment = reply::where("vote",">=",3)->take(10)->get();
		return view('shop.blog',['blog' => $blog,'mostview' => $mostBuy, 'sale' => $sale, 'vote' => $comment]);
	}

	public function updateCart($id, $qty){
		if($id == Cart::getContent()->first()->id){
		Cart::update($id, array(
			'quantity' => array(
				'relative' => false,
				'value' => $qty
			),)
		);
		return Cart::getTotal();
	}
	}

	public function ajaxCode($code,$price){
		if(isset($code) && $code != null){
		$now = Carbon::now("Asia/Ho_Chi_Minh");
		$codeD = code_discount::where("code",$code)->first();
			if($codeD != null){
				if($codeD->min < $price && $codeD->time > 0 && $codeD->expire > $now){
					return $codeD->discount;
				}else if($codeD->min > $price){
					return -1;
				}else if($codeD->time < 0 || $codeD->expire < $now){
					return -2;
				}
		}
			return 0;
		}
	}

	public function getAjaxLike($id){
		$blog = blog::find($id);
		$like = new _like();
		$ip = request()->ip();
		if($blog != null){
		$check = _like::where('id_blog',$id)->get();
		$dcheck = false;
		if(count($check) > 0){
		foreach($check as $check){
			if($check->ip == $ip){
				$dcheck = true;
			}
		}
		if($dcheck != 1){
				$like->ip = $ip;
				$like->id_blog = $id;
				$like->save();
				$like1 = _like::where('id_blog',$id)->get();
				return "<i class='bi bi-heart-fill text-danger'></i> ".count($like1);
		}else{
				$like1 = _like::where('id_blog',$id)->get();
				return "<i class='bi bi-heart-fill text-danger'></i> ".count($like1);
		}
		}else{
				$like->ip = $ip;
				$like->id_blog = $id;
				$like->save();
				$like1 = _like::where('id_blog',$id)->get();
				return "<i class='bi bi-heart-fill text-danger'></i> ".count($like1);
		}
	}
}

	public function getAjaxLikeCurrent($id){
		$like = _like::where('id_blog',$id)->get();
		$ip = request()->ip();
		if(count($like) > 0){
			foreach($like as $like){
				if($like->ip == $ip){
					return "bi bi-heart-fill text-danger";
				}else{
					return "bi bi-heart text-info";
				}
			}
		}else{
			return "bi bi-heart text-info";
		}
	}

	public function create(Request $request)
    {
		$cart = Cart::getContent();
		$code = code_discount::where("code",$request->code)->first();
		$now = Carbon::now("Asia/Ho_Chi_Minh");
		$total;
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$cost_id = substr(str_shuffle($permitted_chars), 0, 10);
		$bill = new bill();
                $this->validate($request,
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
				if($code != null && $code->time > 0 && $code->min < Cart::getTotal() && $code->expire > $now){
           			if(Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000){
						$bill->total = $total = Cart::getTotal()*(0.95 - ($code->discount/100));	
						$bill->discount = 5 + $code->discount;
               		 }elseif(Cart::getTotal() > 1000000){
						$bill->total = $total = Cart::getTotal()*(0.9 - ($code->discount/100));
						$bill->discount = 10 + $code->discount;
              		  }else{
						$bill->total = $total = Cart::getTotal()*(1 - ($code->discount/100));
						$bill->discount = $code->discount;
						}
				}else{
					if(Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000){
						$bill->total = $total = Cart::getTotal()*0.95;
						$bill->discount = 5;
               		 }elseif(Cart::getTotal() > 1000000){
						$bill->total = $total = Cart::getTotal()*0.9;
						$bill->discount = 10;
               		 }else{
						$bill->total = $total = Cart::getTotal();
						$bill->discount = 0;
             }
			}
		session()->put('user.name', $request->customer);
		session()->put('user.address', $request->address);
		session()->put('user.phone', $request->phone);
		session()->put('user.email', $request->email);
        session(['cost_id' => $cost_id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "METP6SNH";
        $vnp_HashSecret = "FCKYTYBFZZXUQRFISRUMAJXKXUNAMCOE";
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://laravel.com/return-vnpay";
        $vnp_TxnRef = date("YmdHis");
        $vnp_OrderInfo = "Thanh toán hóa đơn mua hàng";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           	$vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
		if(count(Cart::getContent()) > 0){
        return redirect($vnp_Url);
	}else{
		return back()->with('danger','Giỏ hàng của bạn hiện chưa có sản phẩm !');
		}
    }

	public function return(Request $request)
{
    $url = session('url_prev','/');
    if($request->vnp_ResponseCode == "00") {
		$cart = Cart::getContent();
		$customer = session('user.name');
		$code = code_discount::where("code",$request->code)->first();
		$now = Carbon::now("Asia/Ho_Chi_Minh");
		$bill = new bill();
			if(count($cart) > 0){
				if($code != null && $code->time > 0 && $code->min < Cart::getTotal() && $code->expire > $now){
           			if(Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000){
						$bill->total = Cart::getTotal()*(0.95 - ($code->discount/100));	
						$bill->discount = 5 + $code->discount;
               		 }elseif(Cart::getTotal() > 1000000){
						$bill->total = Cart::getTotal()*(0.9 - ($code->discount/100));
						$bill->discount = 10 + $code->discount;
              		  }else{
						$bill->total = Cart::getTotal()*(1 - ($code->discount/100));
						$bill->discount = $code->discount;
						}
				}else{
					if(Cart::getTotal() >= 300000 && Cart::getTotal() <= 1000000){
						$bill->total = Cart::getTotal()*0.95;
						$bill->discount = 5;
               		 }elseif(Cart::getTotal() > 1000000){
						$bill->total = Cart::getTotal()*0.9;
						$bill->discount = 10;
               		 }else{
						$bill->total = Cart::getTotal();
						$bill->discount = 0;
             }
			}
					$bill->customer = $customer;
					$bill->address = session('user.address');
					$bill->phone = session('user.phone');
					$bill->email = session('user.email');
					$bill->stt= 1;
					$bill->pay = 2;
					$bill->save();
					foreach($cart as $item){
						$payment = new payment();
						$payment->customer = $customer;
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
        return redirect($url)->with('success' ,'Đã thanh toán đơn hàng');
    }
    session()->forget('url_prev');
    return redirect($url)->with('danger' ,'Lỗi trong quá trình thanh toán phí dịch vụ !');
}
}

	public function getFilter($id){
		$filters = category::all();
		$check = subcategory::find($id);
		$filter = product::where('id_subcategory',$id)->orWhere('id_relate','like',"%$id%")->paginate(30);
		$mostBuy = product::orderBy("sold","desc")->take(10)->get();
		$sale = product::where("discount",">",0)->orderBy("discount","desc")->take(10)->get();
		$comment = reply::where("vote",">=",3)->take(10)->get();
		$blog = blog::take(10)->get();
		if(isset($check->id)){
			return view("shop.filter",['filter' => $filter,'mostBuy' => $mostBuy,'sale' => $sale, 'comment' => $comment, 'blog' =>$blog,'filters' => $filters,'check' => $check]);
	}else{
		header('location:/');
	}
	}
}