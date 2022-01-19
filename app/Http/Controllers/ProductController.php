<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cache, Carbon\Carbon;
use App\Models\Reply;
use App\Models\Image, App\Models\Attribute;
use Illuminate\Support\Str;
use Auth;

class ProductController extends Controller
{
	public $minutesCache = 240;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$product = Product::orderBy('id', 'desc')->take(30)->get();
		if (!Cache::has('lastest-update'))
			Cache::add('lastest-update', $product, $this->minutesCache);
		$getCache = Cache::get('lastest-update');
		return view('shop.index', ['product' => $getCache]);
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
		$this->validate(
			$req,
			[
				'title' => 'required|min:3',
				'content' => 'required',
				'thumbnail' => 'required',
				'price' => 'required',
				'id_category' => 'required',
				'id_subcategory' => 'required',
				'keyword' => 'required',
				'image' => 'required',
				'order_link' => 'required',
				'discount' => 'required',
				'color' => 'required',
				'size' => 'required',
			],
			[
				'title.required' => 'Bạn chưa nhập tên sản phẩm',
				'price.required' => 'Bạn chưa nhập giá cho sản phẩm',
				'id_category.required' => 'Bạn chưa chọn danh mục',
				'id_subcategory.required' => 'Bạn chưa chọn loại sản phẩm',
				'keyword.required' => 'Bạn chưa nhập từ khóa cho sản phẩm',
				'order_link.required' => 'Bạn chưa nhập link đặt hàng cho sản phẩm',
				'discount.required' => 'Bạn chưa nhập giảm giá',
				'size.required' => 'Bạn chưa nhập size sản phẩm',
				'color.required' => 'Bạn chưa nhập màu sản phẩm',
				'image.required' => 'Bạn chưa nhập nhập link ảnh sản phẩm',
				'product.min' => 'Tên sản phẩm ít nhất phải 3 ký tự',
				'content.required' => 'Bạn chưa nhập mô tả',
				'thumbnail.required' => 'Bạn chưa thêm ảnh đại diện sản phẩm',
			]
		);
		$link = Str::slug($req->title);
		$data = $req->all();
		$data["str_slug"] = $link;
		$product = Product::create($data);

		$idp = $product->id;

		foreach ($req->image as $photo) {
			$img = new image();
			$img->id_product = $idp;
			$img->image = $photo;
			$img->save();
		}

		foreach ($req->size as $size) {
			$attr = new attribute();
			$attr->id_product = $idp;
			$attr->name = "size";
			$attr->value = $size;
			$attr->save();
		}

		foreach ($req->color as $color) {
			$attr = new attribute();
			$attr->id_product = $idp;
			$attr->name = "color";
			$attr->value = $color;
			$attr->save();
		}

		return back()->with('notice', 'Đã thêm sản phẩm mới');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(product $id)
	{
		//
		Carbon::setLocale('vi');
		$check = 0;
		if (session()->has('product') && $id != null) {
			foreach (session('product') as $pro) {
				if ($pro['id'] != $id->id) {
					$check = 0;
				} else {
					$check = 1;
					break;
				}
			}
			if ($check == 0) {
				session()->push('product', ['id' => $id->id, 'item' => $id]);
			}
		} else if ($id != null) {
			session()->put('product', [['id' => $id->id, 'item' => $id]]);
		}
		$n = product::all();
		if (count($n) > 1) {
			$product2 = product::where('id', '!=', $id->id)->inRandomOrder()->limit(10);
		} else {
			$product2 = $id;
		}
		$visited = session('product');
		$relate = product::where('id_category', $id->id_category)->orWhere('id_subcategory', $id->id_subcategory)->orderBy('id', 'desc')->take(10)->get();
		$reply = reply::where('reply', $id->id)->orderBy('id', 'desc')->get();
		return view('shop.detailPro', ['product' => $id, 'random' => $product2, 'reply' => $reply, 'relate' => $relate, 'visited' => $visited]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $req, $id)
	{
		//
		$this->validate(
			$req,
			[
				'title' => 'required|min:3',
				'content' => 'required',
				'thumbnail' => 'required',
			],
			[
				'title.required' => 'Bạn chưa nhập tên sản phẩm',
				'title.min' => 'Tên sản phẩm ít nhất phải 6 ký tự',
				'content.required' => 'Bạn chưa nhập mô tả',
				'thumbnail.required' => 'Bạn chưa thêm ảnh đại diện sản phẩm',
			]
		);


		$product = product::find($id);
		$img = image::where('id_product', $product->id);
		$attr = attribute::where('id_product', $product->id)->get();

		$link = Str::slug($req->title);
		$data = $req->all();
		$data["str_slug"] = $link;
		$product->update($data);

		$idp = $product->id;
		$img->forceDelete();
		attribute::where('id_product', $product->id)->forceDelete();

		foreach ($req->image as $photo) {
			$img = new image();
			$img->id_product = $idp;
			$img->image = $photo;
			$img->save();
		}

		foreach ($req->size as $size) {
			$attr = new attribute();
			$attr->id_product = $idp;
			$attr->name = "size";
			$attr->value = $size;
			$attr->save();
		}

		foreach ($req->color as $color) {
			$attr = new attribute();
			$attr->id_product = $idp;
			$attr->name = "color";
			$attr->value = $color;
			$attr->save();
		}

		return back()->with('notice', 'Cập nhật thành công');
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
		product::find($id)->delete();
		image::where('id_product', $id)->delete();
		attribute::where('id_product', $id)->delete();
		return back()->with('notice', 'Đã xóa');
	}
}
