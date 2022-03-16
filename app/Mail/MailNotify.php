<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Payment;
use App\Models\Bill;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $id)
    {
        //
        $this->details = $details;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bill = bill::find($this->id);
        $payment = payment::where('code_bill',$this->id)->orderBy('id','desc')->get();
        return $this->subject('THANH TOÁN ĐƠN HÀNG')->view('shop.email',['payment' => $payment,'bill' => $bill]);
    }
}
