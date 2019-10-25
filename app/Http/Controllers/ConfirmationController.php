<?php

namespace App\Http\Controllers;

use App\Bill_Detail;
use App\Bills;
use App\Customer;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('view.pages.thankyou');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $cart = Cart::getContent();

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->payment_method = $request->payment_method;
        $customer->status = "Chưa giao";
        $customer->save();

        $bill = new Bills;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = Cart::getToTal();
        $bill->payment = $request->payment_method;
        $bill->status = "Chưa giao";
        $bill->save();

        foreach ($cart as $carts) {
            $bill_detail = new Bill_Detail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $carts->id;
            $bill_detail->quantity = $carts->quantity;
            $bill_detail->unit_price = $carts->price / $carts->quantity;
            $bill_detail->save();
        }

        Cart::clear();
        return view('view.pages.thankyou');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
