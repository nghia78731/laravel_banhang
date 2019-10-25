<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index ()
    {
        $sessionCart = Cart::session(Auth::id());
        return view('view.pages.cart', compact('sessionCart'));
    }

    public function store (Request $request)
    {
        $sessionCart = Cart::session(Auth::id());
        if (Auth::check()) {
            Cart::session(Auth::id())
                ->add($request->id, $request->name, $request->prince, 1, array('image' => $request->image, 'promotion_price' => $request->promotion_price));
            return view('view.pages.cart', compact('sessionCart'))->with('success_message', 'Đã thêm vào giỏ hàng');
        } else {

            return redirect()->route('signup.showlogin')->with('thongbao', 'Bạn phải đăng nhập để mua hàng');
        }

    }

    public function empty ()
    {
        Cart::clear();
    }

    public function delete ($id)
    {
        Cart::session(Auth::id())->remove($id);

        return back()->with('success_message', 'Item đã được xóa');
    }

    public function update (Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
    }
}
