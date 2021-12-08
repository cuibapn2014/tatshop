<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Cache, Carbon\Carbon;
use App\Reply;
use App\Image, App\Attribute;
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
        $product = product::orderBy('id','desc')->take(30)->get();
        if(!Cache::has('lastest-update'))
		Cache::add('lastest-update',$product, $minutesCache);
		$getCache = Cache::get('lastest-update');
		return view('shop.index',['product' => $getCache]);	
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
		if(session()->has('product') && $id != null){
			foreach(session('product') as $pro){
				if($pro['id'] != $id->id){
					$check = 0;
				}else{
					$check = 1;
					break;
				}
			}
			if($check == 0){
				session()->push('product',['id' => $id->id,'item' => $id]);
			}
		}else if($id != null){
			session()->put('product',[['id' => $id->id,'item' => $id]]);
		}
            $n = product::all();
            if(count($n) > 1){
                    $product2 = product::where('id','!=',$id->id)->inRandomOrder()->limit(10);
            }else{
                     $product2 = $id;
            }
		$visited = session('product');
		$relate = product::where('id_category',$id->id_category)->orWhere('id_subcategory',$id->id_subcategory)->orderBy('id','desc')->take(10)->get();
		$reply = reply::where('reply',$id->id)->orderBy('id','desc')->get();
		return view('shop.detailPro',['product' => $id,'random' => $product2,'reply' => $reply,'relate' => $relate,'visited' => $visited]);
	
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
        image::where('id_product',$id)->delete();
        attribute::where('id_product',$id)->delete();
		return back()->with('notice','Đã xóa');
    }
}