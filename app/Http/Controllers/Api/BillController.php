<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Payment;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return bill::with(["payment","status"])->orderBy("id", "desc")->get();
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
        $bill = new bill();
        $bill->customer =$request->customer;
        $bill->total = $request->total;
        $bill->discount = $request->discount;
        $bill->email = $request->email;
        $bill->address = $request->address;
        $bill->phone = $request->phone;
        $bill->stt = $request->stt;
        $bill->pay = $request->pay;
        $bill->save();
        
        $id_bill = bill::all()->last();

        foreach($request->payment as $payment)
        {
            $p = new payment();
            $p->id_product = $payment["id_product"];
            $p->code_bill = $id_bill->id;
            $p->image = $payment["image"];
            $p->attr = $payment["attr"];
            $p->name = $payment["name"];
            $p->price = $payment["price"];
            $p->qty = $payment["qty"];
            $p->status = $payment["status"];
            $p->save();
        }

        return response()->json(["success" => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(bill $bill)
    {
        //
        return $bill->with("payment")->find($bill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bill $bill)
    {
        //
        $bill->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill $bill)
    {
        //
        $pay = payment::where("code_bill", $bill->id)->delete();
        $bill->delete();
    }

    public function getBills($email){
        return bill::with(["payment"])->where("email", $email)->orderBy("id","desc")->get();
    }
}
