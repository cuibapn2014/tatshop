<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\payment;
use App\bill;
use Redirect,Response,DB,Config;

class EmailController extends Controller
{
    //
    public function sendEmail($id)
    {
      $bill = bill::find($id);
      $details = [
      	'title' => 'THÔNG TIN THANH TOÁN TAT SHOP',
      	'body' => 'TAT Shop chân thành cảm ơn quý khách đã mua hàng !',
      ];
      \Mail::to($bill->email)->send(new \App\Mail\MailNotify($details,$id));
     	return back()->with('notice','Đã gửi mail thanh toán đến khách hàng '.$bill->customer);
    }
}
