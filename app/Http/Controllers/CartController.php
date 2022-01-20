<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
	//
	public function index()
	{
		$cartItem = Cart::getContent();
		return view('shop.cart', ['cart' => $cartItem]);
	}

	public function store($id)
	{
		if (isset($_GET['color'])) {
			if ($_GET['color'] == "") {
				return back()->with('danger', 'Bạn chưa chọn màu sản phẩm');
			}
		} else {
			return back()->with('danger', 'Bạn chưa chọn màu sản phẩm');
		}
		$qty = $_GET['qty'];
		$product = product::find($id);
		$price = $product->price * (1 - ($product->discount) / 100);
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

	public function update($id, $qty)
	{
		//if ($id == Cart::getContent()->first()->id) {
			Cart::update(
				$id,
				array(
					'quantity' => array(
						'relative' => false,
						'value' => $qty
					),
				)
			);
			return Cart::getTotal();
		//}
	}

	public function destroy($id)
	{
		Cart::remove($id);
		return back();
	}
}
