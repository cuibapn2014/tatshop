<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon;
use App\User;
use App\attribute, App\image;
use App\product;
use App\bill, App\payment;
use App\ward, App\district;
use App\category, App\subcategory;
use App\blog, App\reply, App\deal, App\code_discount;

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
		$cate = category::all();
		return view('shop.admin.dashboard.addPro',['cate' => $cate]);
	}
	public function postThemSanPham(request $req){
		$this -> validate($req,
		[
			'product' => 'required|min:3',
			'content' => 'required',
			'thumbnail' => 'required',
			'price' => 'required',
			'category' => 'required',
			'subcategory' => 'required',
			'keyword' => 'required',
			'image' => 'required',
			'order_link' => 'required',
			'discount' => 'required',
			'color' => 'required',
			'size' => 'required',
		],
		[
			'product.required' => 'Bạn chưa nhập tên sản phẩm',
			'price.required' => 'Bạn chưa nhập giá cho sản phẩm',
			'category.required' => 'Bạn chưa chọn danh mục',
			'subcategory.required' => 'Bạn chưa chọn loại sản phẩm',
			'keyword.required' => 'Bạn chưa nhập từ khóa cho sản phẩm',
			'order_link.required' => 'Bạn chưa nhập link đặt hàng cho sản phẩm',
			'discount.required' => 'Bạn chưa nhập giảm giá',
			'size.required' => 'Bạn chưa nhập size sản phẩm',
			'color.required' => 'Bạn chưa nhập màu sản phẩm',
			'image.required' => 'Bạn chưa nhập nhập link ảnh sản phẩm',
			'product.min' => 'Tên sản phẩm ít nhất phải 3 ký tự',
			'content.required' => 'Bạn chưa nhập mô tả',
			'thumbnail.required' => 'Bạn chưa thêm ảnh đại diện sản phẩm',
		]);
		$product = new product;
		$img = new image;
		$attr = new attribute;
		$product->title = strtoupper($req->product);
		$product->content = $req->content;
		$product->qty = $req->qty;
		$product->thumbnail = $req->thumbnail;
		$product->price = $req->price;
		$product->_link = Str::slug($req->product);
		$product->discount = $req->discount;
		$product->sold = 0;
		$product->id_category = $req->category;
		$product->id_subcategory = $req->subcategory;
		$product->id_relate = $req->relate;
		$product->keyword = $req->keyword;
		$product->order_link = $req->order_link;
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
		$category = category::all();
		$attr = attribute::where('id_product',$id)->get();
		$img = image::where('id_product',$id)->get();
		return view('shop.admin.dashboard.editPro',['id' => $id,'product' => $product,'attr' => $attr,'$img' => $img,'category' => $category]);
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
		$product->order_link = $req->order_link;
		$product->id_category = $req->category;
		$product->id_subcategory = $req->subcategory;
		$product->id_relate = $req->relate;
                
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
		$recieved = bill::where("stt",4)->get();
		$confirm = bill::where("stt",1)->get();
		$transfering = bill::where("stt",3)->get();
		return view('shop.admin.bills',['bills' => $payment,'confirm' => $confirm,'transfering' => $transfering,'recieved' => $recieved]);
	}
	
	public function getDeleteBills($id){
		$bill = bill::find($id);
		$bill->delete();
		return back()->with('notice','Đã xóa thành công');
	}

	public function getDetailBills($id){
		$payment = payment::where('code_bill',$id)->orderBy('id','desc')->get();
        $box = payment::where('status',0)->get();
		$bill = bill::find($id);
		if($bill->stt == 1){
			$bill->stt = 2;
		foreach($payment as $p){
			if($p->status == 0){
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
		return view('shop.admin.detailBills',['detail' => $payment,'bill' => $bill]);
	}
	
	public function getShip($id){
		$bills = bill::find($id);
		if($bills->stt == 2){
		$bills->stt = 3;
		}elseif($bills->stt == 3){
			$bills->stt = 4;
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
		$product = product::where('title','like',"%$name%")->orWhere('id','like',"%$name%")->get();
		if(count($product) > 0){
			foreach($product as $product){
				echo "<tr>";
      echo '<th scope="row">'.$product->id.'</th>';
      echo '<td>'.$product->title.'</td>';
	  echo '<td>'.$product->category->category.'</td>';
	  echo '<td>'.$product->subcategory->sub_category.'</td>';
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

	  echo '</td>';
	  echo '<td>'.$product->qty.'</td>';
	  echo '<td><a href="admin/dashboard/edit/'.$product->id.'" class="btn btn-outline-info rounded-0">Edit <i class="far fa-edit"></i></a></a>';
	  echo '<a href="admin/dashboard/delete/'.$product->id.'" class="btn btn-danger rounded-0">Xóa <i class="far fa-trash-alt"></i></a></td>';
	  echo '<td><a class="btn btn-success rounded-0" href="'.$product->order_link.'">Order now</a></td>';
	  echo '</tr>';
			}
		}else{
			echo "<tr>Không tìm thấy sản phẩm</tr>";
		}
	}

	public function getAjaxCategory($category){
		$subcate = subcategory::where('id_category',$category)->get();
		foreach($subcate as $sub){
			echo "<option value=".$sub->id.">".$sub->sub_category."</option>";
		}
	}

	public function addCategory(){
		$cate = category::all();
		$sub = subcategory::all();
		return view('shop.admin.dashboard.addCategory',['category' => $cate,'sub' => $sub]);
	}

	public function postAddCategory(Request $req){
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

	public function getDeleteCategory($id){
		$cate = category::find($id);
		$cate->delete();
		return back()->with('notice','Đã xóa danh mục sản phẩm');
	}

	public function getDeleteSubcategory($id){
		$sub = subcategory::find($id);
		$sub->delete();
		return back()->with('notice','Đã xóa loại sản phẩm');
	}

	public function getCodeDiscount(){
		$code = code_discount::all();
		return view('shop.admin.dashboard.codeDiscount',['code' => $code]);
	}

	public function postCodeDiscount(Request $req){
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
			$code = new code_discount();
			$code->code = strtoupper($req->code);
			$code->discount = $req->discount;
			$code->time = $req->moreTime;
			$code->min = $req->min;
			$deal->expired = $code->expire = $req->expired;
			$code->save();
			$deal->save();
			return back()->with('notice','Thêm mã thành công');
	}

	public function getBlog(){
		$blog = blog::all();
		return view("shop.admin.dashboard.blog",['blog' => $blog]);
	}

	public function postBlog(Request $req){
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

	public function getDeleteBlog($id){
		$blog = blog::find($id);
		$blog->delete();
		return back()->with('notice','Đã xóa');
	}

	public function getAnalyze(){
		$percent = array(0,0,0,0,0,0,0,0);
	    $product = product::all()->sum('sold');
	    $total = bill::all()->sum('total');
	    $b = product::all();
	    $last = \Carbon\Carbon::now("Asia/Ho_Chi_Minh")->subMonth(12);
	    $now = \Carbon\Carbon::now("Asia/Ho_Chi_Minh");
	    $bill = bill::whereBetween('created_at',[$last,$now])->get();
	    foreach($b as $b){
		    switch($b->id_category){
		        case 1:
		            $percent[0] += $b->sold;break;
		        case 2:
		            $percent[1] += $b->sold;break;
		        case 3:
		            $percent[2] += $b->sold;break;
		        case 4:
		            $percent[3] += $b->sold;break;
		        case 5:
		            $percent[4] += $b->sold;break;
		        case 6:
		            $percent[5] += $b->sold;break;
		        case 7:
		            $percent[6] += $b->sold;break;
		        case 8:
		            $percent[7] += $b->sold;break;
					default: 
					$percent[0] += 0;break; 
		    }
		}
		return view('shop.admin.analyze',['bill' => $bill,'total' => $total,'product' => $product,'percent' => $percent]);
	}

	public function getUpload(){
		return view('shop.admin.dashboard.upload');
	}

	public function getDeleteCode($id){
		$code = code_discount::find($id);
		if($code != null){
			$code->delete();
			return back()->with('notice','Xóa mã thành công');
		}
		return back();
	}
}
?>