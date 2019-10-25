<?php

namespace App\Http\Controllers;

use App\Products;
use App\Type_Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.product');
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
    public function deleteProduct($id)
    {
        $product = Products::where('id', $id)->delete();

        return back()->with('thongbao', 'Xóa sản phẩm thành công');
    }

    public function showEditProduct($id)
    {
        $product = Products::find($id);
        return view('admin.pages.edit_product', compact('product'));
    }

    public function editProduct(Request $request, $id)
    {
        DB::table('products')->where('id',$id)
                                    ->update([
                                        'name' => $request->input('name'),
                                        'id_type' => $request->input('id_type'),
                                        'description' => $request->input('description'),
                                        'unit_price' => $request->input('unit_price'),
                                        'promotion_price' => $request->input('promotion_price'),
                                        'image' => $request->input('image')
                                    ]);

        return back()->with('thongbao', 'Sửa thành công');
    }

    public function showProduct() {
        return view('admin.pages.product');
    }

    public function listProduct() {
        $products = Products::all();
        return view('admin.pages.list_product', compact('products'));
    }

    public function addProduct(Request $request) {
        $products = $request->except('_token');

        Products::create($products);

        return back()->with('thongbao', 'Thêm sản phẩm thành công');
    }

    public function showTypeProduct() {
        return view('admin.pages.type_product');
    }

    public function addTypeProduct(Request $request) {
        $typeProduct = $request->except('_token');
        $typeProduct['name_slug'] = $typeProduct['name'];
        $typeProduct['image'] = $request->image->getClientOriginalName();


        $file = $request->image;
         $file->move('images\product', $file->getClientOriginalName());


        Type_Products::create($typeProduct);

        return back()->with('thongbao', 'Thêm danh mục thành công');
    }


    public function listTypeProduct()
    {
        return view('admin.pages.list_type_product');
    }

    public function deleteTypeProduct($id)
    {
        Type_Products::where('id', $id)->delete();

        return back()->with('thongbao', 'Bạn đã xóa thành công');
    }

    public function showEditTypeProduct($id)
    {
        $typeProduct = Type_Products::find($id);
        return view('admin.pages.edit_type_product', compact('typeProduct'));
    }
}
