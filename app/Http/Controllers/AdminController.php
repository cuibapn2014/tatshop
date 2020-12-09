<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use App\attribute;
use App\product;
use App\image;
use App\bill;
use App\ward;
use App\district;
use App\payment;
use App\reply;

class AdminController extends Controller
{
    //
	public function __construct()
	{
		if(Auth::check())
		{
			View::share('user',Auth::user());
		}
	} 
	
	public function getSignup(){
		return view("shop/admin/signup");
	}
	public function getLogin(){
		if(Auth::check()){
			if(Auth::user()->level == "Admin"){
			return redirect('admin');
			}else{
				return redirect('user');
			}
		}
		return view('shop.admin.login');
	}
	public function getLogout(){
		Auth::logout();
		return redirect('login');
	}
	public function postLogin(request $request){
		$this -> validate($request,
		[
			'username' => 'required',
			'password' => 'required',
		],
		[
			'username.required' => 'Bạn chưa nhập tài khoản',
			'password.required' => 'Bạn chưa nhập mật khẩu',
		]);
		 $remember = $request->has('remember') ? true : false;
		if(Auth::attempt(['email' => $request->username, 'password' => $request->password],$remember)){
			if(Auth::user()->level == "Admin"){
			return redirect('admin');
			}else{
				return redirect('user');
			}
		}else{
			return back()->with('danger','Email hoặc mật khẩu không chính xác');
		}
	}
	
	public function postSignup(request $request){
		$this -> validate($request,
		[
			'fullname' => 'required|min:3',
			'email' => 'required|unique:users,email',
			'password' => 'required|min:6',
			're-password' => 'required|same:password',
		],
		[
			'fullname.required' => 'Bạn chưa nhập họ tên',
			'fullname.min' => 'Tên ít nhất có 3 ký tự',
			'email.required' => 'Bạn chưa nhập email',
			'email.unique' => 'Email đã tồn tại',
			'password.required' => 'Bạn chưa nhập password',
			'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
			're-password.required' => 'Bạn chưa xác nhận password',
			're-password.same' => 'Mật khẩu xác nhận không trùng khớp',
		]);
		$user = new User();
		$user->name = $request->fullname;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->image = "user.jpg";
		$user->level = "Khách hàng";
		$user->save();
		return back()->with('notice','Đăng ký thành công');
	}
	
	public function getBaoMat(){
		return view('shop.admin.security');
	}
	public function postBaoMat(request $request){
		$this -> validate($request,
		[
			'password' => 'required|min:6',
			're-password' => 'required|same:password',
		],
		[
			'password.required' => 'Bạn chưa nhập mật khẩu mới',
			'password.min' => 'Mật khẩu mới tối thiểu 6 ký tự',
			're-password.required' => 'Bạn chưa xác nhận lại mật khẩu',
			're-password.same' => 'Mật khẩu xác nhận không trùng khớp',
		]);
		$user = User::find(Auth::user()->id);
		$user->password = bcrypt($request->password);
		$user->save();
		return back()->with('notice','Đã cập nhật mật khẩu');
	}
	
	public function getThemSanPham(){
		return view('shop.admin.dashboard.addPro');
	}
	public function postThemSanPham(request $req){
		$this -> validate($req,
		[
			'product' => 'required|min:3',
			'content' => 'required',
			'thumbnail' => 'required',
			'price' => 'required',
		],
		[
			'product.required' => 'Bạn chưa nhập tên sản phẩm',
			'price.required' => 'Bạn chưa nhập giá cho sản phẩm',
			'product.min' => 'Tên sản phẩm ít nhất phải 3 ký tự',
			'content.required' => 'Bạn chưa nhập mô tả',
			'thumbnail.required' => 'Bạn chưa thêm ảnh đại diện sản phẩm',
		]);
		$product = new product;
		$img = new image;
		$attr = new attribute;
		$product->title = $req->product;
		$product->content = $req->content;
		$product->qty = $req->qty;
		$product->thumbnail = $req->thumbnail;
		$product->price = $req->price;
		$product->_link = Str::slug($req->product);
		$product->discount = $req->discount;
		$product->sold = 0;
		$product->save();
		
		$product1 = product::orderBy('id','desc')->get();
		foreach($req->image as $photo){
		$img->id_product = $product1[0]->id;
		$img->id_user = Auth::user()->id;
		$data[] = $photo;
	}
		foreach($req->size as $size){
			$attr->id_product = $product1[0]->id;
			$data1[] = $size;
}
		foreach($req->color as $color){
			$attr->id_product = $product1[0]->id;
			$data2[] = $color;
		}
		 $img->image = json_encode($data);
		 $attr->size = json_encode($data1);
		 $attr->color = json_encode($data2);
		 $attr->save();
		 $img->save();
		return back()->with('notice','Đã thêm sản phẩm mới');
	}
	public function getEdit($id){
		$product = product::find($id);
		$attr = attribute::where('id_product',$id)->get();
		$img = image::where('id_product',$id)->get();
		return view('shop.admin.dashboard.editPro',['id' => $id,'product' => $product,'attr' => $attr,'$img' => $img]);
	}
	
	public function postEdit(request $req, $id){
		$this -> validate($req,
		[
			'product' => 'required|min:3',
			'content' => 'required',
			'thumbnail' => 'required',
		],
		[
			'product.required' => 'Bạn chưa nhập tên sản phẩm',
			'product.min' => 'Tên sản phẩm ít nhất phải 6 ký tự',
			'content.required' => 'Bạn chưa nhập mô tả',
			'thumbnail.required' => 'Bạn chưa thêm ảnh đại diện sản phẩm',
		]);
		$product = product::find($id);
		$img = image::find($product->image->id);
		$attr = attribute::find($product->attr->id);
	
		$product->title = $req->product;
		$product->content = $req->content;
		$product->price = $req->price;
		$product->qty = $req->qty;
		$product->thumbnail = $req->thumbnail;
		$product->_link = Str::slug($req->product);
		$product->discount = $req->discount;
                
                if(isset($img)){
		if($req->image != null){
		foreach($req->image as $photo){
		$img->id_user = Auth::user()->id;
		$data[] = $photo;
			}
		}
                }else{
                        $img = new image;
                        if($req->image != null){
                        foreach($req->image as $photo){
                        $img->id_user = Auth::user()->id;
                        $data[] = $photo;
                                }
                }
                }
                
		if($req->size != null){
		foreach($req->size as $size){
			$data1[] = $size;
			}
		}
		if($req->color != null){
		foreach($req->color as $color){
			$data2[] = $color;
		}
	}
		 $img->image = json_encode($data);
		 $attr->size = json_encode($data1);
		 $attr->color = json_encode($data2);
		 
		$attr->save();
		$img->save();
		$product->save();
		
		return back()->with('notice','Cập nhật thành công');
	}

	public function getManagePro(){
		$_product = product::orderBy('id','desc')->paginate(25);
		return view('shop.admin.dashboard.managePro',['_product' => $_product]);
	}
        
        public function postDiscount(Request $req){
		$product = product::all();
		$discount = $req->_discount;
		foreach($product as $product){
			$product->discount = $discount;
			$product->save();
		}
		
		return back()->with("notice","Cập nhật giảm giá thành công !");
	}
	
	public function getDeletePro($id){
		product::find($id)->delete();
                image::where('id_product',$id)->delete();
                attribute::where('id_product',$id)->delete();
		return back()->with('notice','Đã xóa');
	}
	
	public function getManageCus(){
		$cus = user::where('level','=','Khách hàng')->orderBy('id','desc')->get();
		return view('shop.admin.dashboard.manageCus',['customer' => $cus]);
	}
	
	public function getEditUser($id){
		$user = user::find($id);
		return view('shop.admin.dashboard.editCus',['id' => $id,'user' => $user]);
	}
	public function postEditUser(request $req,$id){
		$cus = user::find($id);
		$cus->level = $req->permis;
		$cus->save();
		if(Auth::user()->id == 1){
			return redirect('admin/dashboard/quan-ly-thanh-vien')->with('notice','Đã thay đổi');
		}
		return redirect('admin/dashboard/quan-ly-khach-hang')->with('notice','Đã thay đổi');
	}
	public function getDeleteUser($id){
		user::find($id)->delete();
		return back()->with('notice','Đã xóa');
	}
	public function getManageMem(){
		$user = user::where('level','Admin')->get();
		return view('shop.admin.dashboard.manageMem',['user' => $user]);
	}
	public function getUpdateUser(){
		return view('shop.admin.dashboard.updateInfo');
	}
	public function postUpdateUser(request $request){
		$this -> validate($request,
		[
			'fullname' => 'required|min:3',
			'sex_user' => 'required',
			'birthday' => 'required',
			'imgAvatar' => 'max:1024',
			'phone' => 'min:10|max:10',
		],
		[	
			'fullname.min' => 'Tên phải có ít nhất 3 ký tự ',
			'phone.max' => 'Số điện thoại không hợp lệ',
			'phone.min' => 'Số điện thoại không hợp lệ',
			'fullname.required' => 'Bạn chưa nhập tên',
			'sex_user.required' => 'Bạn chưa chọn giới tính',
			'birthday.required' => 'Bạn chưa chọn ngày sinh',
			'imgAvatar.max' => 'Kích thước ảnh phải ít hơn 1 MB',
		]);
		$district = district::where('id',$request->district)->get();
		$address = $district->first()->district.", Phường ".$request->ward." - ".$request->address;
		$id = Auth::user()->id;
		$user = User::find($id);
		$user->name = $request->fullname;
		$user->sex = $request->sex_user;
		$user->birthday = $request->birthday;
		$user->address = $address;
		$user->phone = $request->phone;
		$file = $request->file('imgAvatar');
		if($request->hasFile('imgAvatar')){
		$name = $file->getClientOriginalName();
		$duoi = $file->getClientOriginalExtension();
		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
			return redirect()->back()->with('danger','Hãy chắc chắn rằng̀ bạn đang upload file hình ảnh');
		}
		$img = md5(rand(0,10000).$name);
		while(file_exists("image/".$img)){
			$img = md5(rand(0,10000).$name);
		}
		$oldImg = "image/".$user->image;
		if($user->image != "user.jpg"){
		unlink($oldImg);
		}
		$file->move("image/",$img);
		$user->image = $img;
		}
		 $user->save();

			 return back()->with('notice','Cập nhật thành công');
	}
	public function getUpdateCus(){
		$district = district::all();
		return view('shop.user.updateInfo',['district' => $district]);
	}
	
	public function getAjax($district){
		$ward = ward::where('district',$district)->get();
		foreach($ward as $ward){
			echo '<option value="'.$ward->ward.'">'.$ward->ward.'</option>';
		}
	}
	
	public function getChangePass(){
		return view('shop.user.security');
	}
	
	public function getTransfer(){
                $district = district::all();
		$payment = payment::where('id',Auth::user()->id)->get();
		return view('shop.user.user',['payment' => $payment,'district' => $district]);
	}
	
	public function getBills(){
		$payment = bill::orderBy('id','desc')->get();
		return view('shop.admin.bills',['bills' => $payment]);
	}
	
	public function getDetailBills($id){
		$payment = payment::where('code_bill',$id)->orderBy('id','desc')->get();
                $box = payment::where('status',0)->get();
		$bill = bill::find($id);
		if($bill->stt == "Chờ xác nhận"){
		$bill->stt = "Đã xác nhận";
		foreach($box as $box){ 
			$product = product::find($box->id_product);
			$product->qty -= $box->qty;
                        $product->sold += $box->qty;
			
		}
			$box->status = 1;
			$box->save();
			$product->save();

		}
		$bill->save();
		return view('shop.admin.detailBills',['detail' => $payment,'bill' => $bill]);
	}
	
	public function getShip($id){
		$bills = bill::find($id);
		if($bills->stt == "Đã xác nhận"){
		$bills->stt = "Đang giao";
		}elseif($bills->stt == "Đang giao"){
			$bills->stt = "Đã giao";
		}
		$bills->save();
		return back();
	}
	
	public function getComment(){
		$reply = reply::all();
		return view('shop.admin.dashboard.comments',['reply' => $reply]);
	}
        
	public function getDeleteComment($id){
		$reply = reply::find($id);
		$reply->delete();
		return back();
	}
        
        public function getAjaxSearch($name){
		$product = product::where('title','like',"%$name%")->get();
		if(count($product) > 0){
			foreach($product as $product){
				echo "<tr>";
      echo '<th scope="row">'.$product->id.'</th>';
      echo '<td>'.$product->title.'</td>';
	  echo '<td>'.number_format($product->price).'đ</td>';
      echo '<td>- '.$product->discount.'%</td>';
	  echo '<td>';
	if(!empty($product->attr->size)){
		$data = $product->attr->size;
		$size = json_decode($data,true);
		foreach($size as $size){
			echo $size.", ";
		}
	}
		echo '</td>';
	    echo '<td>';
			if(!empty($product->attr->color)){
		$data = $product->attr->color;
		$color = json_decode($data,true);
		foreach($color as $color){
			echo $color.", ";
			}
			}

	  echo'</td>';
	  echo'<td>'.$product->qty.'</td>';
	  echo'<td><a href="admin/dashboard/edit/'.$product->id.'">Edit <i class="far fa-edit"></i></a></a> | <a href="admin/dashboard/delete/'.$product->id.'">Xóa <i class="far fa-trash-alt"></i></a></td>
    echo</tr>';
			}
		}else{
			echo "<tr>Không tìm thấy sản phẩm</tr>";
		}
	}
}
