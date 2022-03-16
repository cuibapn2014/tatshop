<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon;
use App\User;
use Cache;
use App\Models\Attribute, App\Models\Image;
use App\Models\Product;
use App\Models\Bill, App\Models\Payment;
use App\Models\Ward, App\Models\District;
use App\Models\Category, App\Models\Subcategory;
use App\Models\Blog;

class AdminController extends Controller
{
	//
	public function __construct()
	{
		if (Auth::check()) {
			View::share('user', Auth::user());
		}
	}

	public function getSignup()
	{
		return view("shop/admin/signup");
	}
	public function getLogin()
	{
		if (Auth::check() || Auth::user()) {
			if (Auth::user()->level >= 1) {
				return redirect('admin');
			} else {
				return redirect('user');
			}
		}
		return view('shop.admin.login');
	}
	public function getLogout()
	{
		Auth::logout();
		return redirect('login');
	}
	public function login(request $request)
	{
		$this->validate(
			$request,
			[
				'username' => 'required',
				'password' => 'required',
			],
			[
				'username.required' => 'Bạn chưa nhập tài khoản',
				'password.required' => 'Bạn chưa nhập mật khẩu',
			]
		);
		$remember = $request->has('remember') ? true : false;
		if (Auth::attempt(['email' => $request->username, 'password' => $request->password], $remember)) {
			if (Auth::user()->level >= 1)
				return redirect('admin');
			else
				return redirect('user');
		} else
			return back()->with('danger', 'Email hoặc mật khẩu không chính xác');
	}

	public function getBaoMat()
	{
		return view('shop.admin.security');
	}

	public function postBaoMat(request $request)
	{
		$this->validate(
			$request,
			[
				'password' => 'required|min:6',
				're-password' => 'required|same:password',
			],
			[
				'password.required' => 'Bạn chưa nhập mật khẩu mới',
				'password.min' => 'Mật khẩu mới tối thiểu 6 ký tự',
				're-password.required' => 'Bạn chưa xác nhận lại mật khẩu',
				're-password.same' => 'Mật khẩu xác nhận không trùng khớp',
			]
		);
		$user = User::find(Auth::user()->id);
		$user->password = bcrypt($request->password);
		$user->save();
		return back()->with('notice', 'Đã cập nhật mật khẩu');
	}

	public function getThemSanPham()
	{
		$cate = category::all();
		return view('shop.admin.dashboard.addPro', ['cate' => $cate]);
	}

	public function getEdit($id)
	{
		$product = product::find($id);
		$category = category::all();
		$attr = attribute::where('id_product', $id)->get();
		$img = image::where('id_product', $id)->get();
		return view('shop.admin.dashboard.editPro', ['id' => $id, 'product' => $product, 'attr' => $attr, '$img' => $img, 'category' => $category]);
	}

	public function getManagePro()
	{
		$_product = product::orderBy('id', 'desc')->get();
		if (!Cache::has('manage-product'))
			Cache::add('manage-product', $_product, 1);
		return view('shop.admin.dashboard.managePro', ['_product' => Cache::get('manage-product')]);
	}

	public function postDiscount(Request $req)
	{
		$product = product::all();
		$discount = $req->_discount;
		foreach ($product as $product) {
			$product->discount = $discount;
			$product->save();
		}

		return back()->with("notice", "Cập nhật giảm giá thành công !");
	}

	public function getManageCus()
	{
		$cus = user::where('level', 0)->orderBy('id', 'desc')->get();
		return view('shop.admin.dashboard.manageCus', ['customer' => $cus]);
	}

	public function getEditUser($id)
	{
		$user = user::find($id);
		return view('shop.admin.dashboard.editCus', ['id' => $id, 'user' => $user]);
	}

	public function postEditUser(request $req, $id)
	{
		$cus = user::find($id);
		$cus->level = $req->permis;
		$cus->save();
		if (Auth::user()->id == 1) {
			return redirect('admin/dashboard/quan-ly-thanh-vien')->with('notice', 'Đã thay đổi');
		}
		return redirect('admin/dashboard/quan-ly-khach-hang')->with('notice', 'Đã thay đổi');
	}

	public function getDeleteUser($id)
	{
		user::find($id)->delete();
		return back()->with('notice', 'Đã xóa');
	}
	public function getManageMem()
	{
		$user = user::where('level', 1)->get();
		return view('shop.admin.dashboard.manageMem', ['user' => $user]);
	}
	public function getUpdateUser()
	{
		return view('shop.admin.dashboard.updateInfo');
	}

	public function getUpdateCus()
	{
		$district = district::all();
		return view('shop.user.updateInfo', ['district' => $district]);
	}

	public function getAjax($district)
	{
		$ward = ward::where('district', $district)->get();
		foreach ($ward as $ward) {
			echo '<option value="' . $ward->ward . '">' . $ward->ward . '</option>';
		}
	}

	public function getChangePass()
	{
		return view('shop.user.security');
	}

	public function getTransfer()
	{
		$district = district::all();
		$payment = payment::where('id', Auth::user()->id)->get();
		return view('shop.user.user', ['payment' => $payment, 'district' => $district]);
	}

	public function getShip($id)
	{
		$bills = bill::find($id);
		$bills->timestamps = false;
		if ($bills->stt == 2) {
			$bills->stt = 3;
		} elseif ($bills->stt == 3) {
			$bills->stt = 4;
		}
		$bills->save();
		return back();
	}

	public function getAjaxSearch($name)
	{
		$product = product::where('title', 'like', "%$name%")->orWhere('id', 'like', "%$name%")->get();
		if (count($product) > 0) {
			foreach ($product as $product) {
				echo "<tr>";
				echo '<th scope="row">' . $product->id . '</th>';
				echo '<td>' . $product->title . '</td>';
				echo '<td>' . $product->category->category . '</td>';
				echo '<td>' . $product->subcategory->sub_category . '</td>';
				echo '<td>' . number_format($product->price) . 'đ</td>';
				echo '<td>- ' . $product->discount . '%</td>';
				echo '<td>';
				if (!empty($product->attr->size)) {
					$data = $product->attr->size;
					$size = json_decode($data, true);
					foreach ($size as $size) {
						echo $size . ", ";
					}
				}
				echo '</td>';
				echo '<td>';
				if (!empty($product->attr->color)) {
					$data = $product->attr->color;
					$color = json_decode($data, true);
					foreach ($color as $color) {
						echo $color . ", ";
					}
				}

				echo '</td>';
				echo '<td>' . $product->qty . '</td>';
				echo '<td><a href="admin/dashboard/edit/' . $product->id . '" class="btn btn-outline-info rounded-0">Edit <i class="far fa-edit"></i></a></a>';
				echo '<a href="admin/dashboard/delete/' . $product->id . '" class="btn btn-danger rounded-0">Xóa <i class="far fa-trash-alt"></i></a></td>';
				echo '<td><a class="btn btn-success rounded-0" href="' . $product->order_link . '">Order now</a></td>';
				echo '</tr>';
			}
		} else {
			echo "<tr>Không tìm thấy sản phẩm</tr>";
		}
	}

	public function getAjaxCategory($category)
	{
		$subcate = subcategory::where('id_category', $category)->get();
		foreach ($subcate as $sub) {
			echo "<option value=" . $sub->id_subcategory . ">" . $sub->sub_category . "</option>";
		}
	}

	public function addCategory()
	{
		$cate = category::all();
		$sub = subcategory::all();
		return view('shop.admin.dashboard.addCategory', ['category' => $cate, 'sub' => $sub]);
	}

	public function getBlog()
	{
		$blog = blog::all();
		return view("shop.admin.dashboard.blog", ['blog' => $blog]);
	}

	public function getAnalyze()
	{
		$percent = array(0, 0, 0, 0, 0, 0, 0, 0);
		$product = product::all()->sum('sold');
		$total = bill::all()->sum('total');
		$totalSale = product::all()->sum('sold');
		$todayTotal = bill::whereDate('created_at', \Carbon\Carbon::today())->sum('total');
		$b = product::all();
		$last = \Carbon\Carbon::now("Asia/Ho_Chi_Minh")->subMonth(1);
		$now = \Carbon\Carbon::now("Asia/Ho_Chi_Minh");
		$bill = bill::whereBetween('created_at', [$last, $now])->get();
		foreach ($b as $b) {
			switch ($b->id_category) {
				case 1:
					$percent[0] += $b->sold;
					break;
				case 2:
					$percent[1] += $b->sold;
					break;
				case 3:
					$percent[2] += $b->sold;
					break;
				case 4:
					$percent[3] += $b->sold;
					break;
				case 5:
					$percent[4] += $b->sold;
					break;
				case 6:
					$percent[5] += $b->sold;
					break;
				case 7:
					$percent[6] += $b->sold;
					break;
				case 8:
					$percent[7] += $b->sold;
					break;
				default:
					$percent[0] += 0;
					break;
			}
		}
		return view('shop.admin.analyze', ['bill' => $bill, 'total' => $total, 'product' => $product, 'percent' => $percent, 'totalSale' => $totalSale,'todayTotal' => $todayTotal]);
	}

	public function getUpload()
	{
		return view('shop.admin.dashboard.upload');
	}
}
