<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\District;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
		$user->level = 0;
		$user->save();
		return back()->with('notice','Đăng ký thành công');
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
    public function update(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        user::find($id)->delete();
		return back()->with('notice','Đã xóa');
    }
}
