<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\Bill;
use Redirect, Response, DB, Config;
use App\Models\Payment;
use Carbon\Carbon;

class EmailController extends Controller
{
  //
  public function sendEmail($id)
  {
    $bill = bill::find($id);
    if ($bill->email != null) {
      $details = [
        'title' => 'THANH TOÁN ĐƠN HÀNG TAT SHOP',
        'body' => 'TAT Shop chân thành cảm ơn quý khách đã mua hàng !',
      ];
      \Mail::to($bill->email)->send(new \App\Mail\MailNotify($details, $id));
      return back()->with('notice', 'Đã gửi mail thanh toán đến khách hàng ' . $bill->customer);
    }
    return back();
  }

  public function sendEmailOrder()
  {
    \Mail::to('nmtworks.7250@gmail.com')->send(new \App\Mail\NotifyOrderMail());
    return redirect('/cart');
  }

  public function detailInvoice($invoice) //TSI 2022 09 x
  {
    $length = strlen($invoice);
    $id = $length >= 11 ? substr($invoice, 11) : 0;
    $bill = bill::find($id);
    if (!empty($bill)) {
      $date = Carbon::parse($bill->updated_at);
      if (strtolower($invoice) != "tsi".$date->format('i').$date->format('Y').$date->format('m').$bill->id) return redirect("/")->with('noresult','Không tìm thấy hóa đơn!');
    } else return redirect('/')->with('noresult','Không tìm thấy hóa đơn!');
    $payment = payment::where('code_bill', $id)->orderBy('id', 'desc')->get();
    return view('shop.email', ['payment' => $payment, 'bill' => $bill]);
  }
}
