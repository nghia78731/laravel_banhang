<?php

namespace App\Http\Controllers;

use App\Products;
use App\Type_Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function showProduct ($id) {

        $products = Products::where('id', $id)->get();

        return view('view.pages.product', compact('products'));
    }

    public function showTypeProduct ($nameSlug, $id) {
        $type_products_all = Type_Products::where('id', $id)->get();
        $products = Products::where('id_type', $id)->paginate(4);

        return view('view.pages.type_products', compact('type_products_all','products'));
    }

    public function getSearch (Request $request) {
        $result = $request->search;
        $data = Products::where('name', 'like', '%'. $result. '%')->get();

        return view('view.pages.search', compact('data'));
    }

}
