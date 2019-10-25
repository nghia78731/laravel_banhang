<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class AdminBill extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = DB::table('customer')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('admin.pages.list_bill', compact('customer'));
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
        //
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
        $customerInfo = DB::table('customer')
                        ->join('bills', 'customer.id', '=', 'bills.id_customer')
                        ->select('customer.*', 'bills.id as bill_id', 'bills.total as bill_total', 'bills.status as bills_status')
                        ->where('customer.id', '=', $id)
                        ->first();
        $billInfo = DB::table('bills')
            ->join('bill_detail', 'bills.id', '=', 'bill_detail.id_bill')
            ->leftJoin('products', 'bill_detail.id_product', '=', 'products.id')
            ->where('bills.id_customer', '=', $id)
            ->select('bills.*', 'bill_detail.*', 'products.name as product_name')
            ->get();

        return view('admin.pages.detail_bill',compact(['customerInfo', 'billInfo']));
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
        $customer = Customer::find($id);
        $customer->status = $request->input('status');
        $customer->save();

        return back()->with('thongbao', 'Cập nhập trạng thái giao hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::where('id', $id)->delete();

        return back()->with('thongbao', 'Xóa đơn hàng thành công');
    }
}
