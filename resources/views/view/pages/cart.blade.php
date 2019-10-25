@extends('view.layout.index')

@section ('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Giỏ hàng</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <div class="alert alert-dark" role="alert">
                        <a href="{{ route('home') }}">Home</a> / <span class="alert-link">Giỏ hàng</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="cart-session container">
                <div>

                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

                    @if (count($sessionCart->getContent()) > 0)
                        <h2>{{ $sessionCart->getContent()->count() }}item trong giỏ hàng</h2>
                    @else
                        <h3>Không có item trong giỏ hàng</h3>
                        <div class="btn btn-outline-danger">
                            <a href="{{ route('home') }}" class="button">Tiếp tục mua hàng</a>
                        </div>
                    @endif
                </div>
            </div>
                <div class="table-responsive">
                    <!-- Shop Products Table -->
                    <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-name">Sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-subtotal">Tổng tiền</th>
                            <th class="product-remove">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($sessionCart->getContent() as $item)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        <div class="media">
                                            <img width="60px" height="60px" class="pull-left" src="{{ asset('images/product'). '/'. $item->attributes->image }}" alt="1">
                                            <div class="media-body">
                                                <p class="font-large table-title">{{ $item->name }}</p>
                                                <a class="table-edit" href="#">Edit</a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="product-price">
                                        @if ($item->attributes->promotion_price == 0)
                                            <span class="amount">{{ number_format($item->price) }}</span>
                                        @else
                                            <span class="amount">{{ number_format($item->attributes->promotion_price) }}</span>
                                        @endif
                                    </td>

                                    <td class="product-quantity">
                                        <input data-id="{{ $item->id }}" data-price="{{ $item->price }}" type="number" size="2" onchange="updateCart(this.value, '{{ $item->id }}')" class="quantity" name="quantity" id="upCart{{ $item->id }}" autocomplete="off" style="text-align: center; max-width: 50px" MIN="1" MAX="30" value="{{ $item->quantity }}">
                                    </td>

                                    <td class="product-subtotal">
                                        @if ($item->attributes->promotion_price == 0)
                                            <span class="amount" id="total_price_{{ $item->id }}">{{ number_format(($item->price)* $item->quantity) }} VNĐ</span>
                                        @else
                                            <span class="amount" id="total_price_{{ $item->id }}">{{ number_format(($item->attributes->promotion_price)* $item->quantity) }} VNĐ</span>
                                        @endif
                                    </td>

                                    <td class="product-remove">
                                        <a href="{{ route('cart.delete', $item->id) }}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="6" class="actions">

                                <div class="coupon">
                                    <label for="coupon_code">Mã giảm giá</label>
                                    <input type="text" name="coupon_code" value="" placeholder="Coupon code">
                                    <button type="submit" class="beta-btn primary" name="apply_coupon">Áp dụng <i class="fa fa-chevron-right"></i></button>
                                </div>
                                <a href="{{ route('checkout.index') }}" class="beta-btn primary">Thanh Toán <i class="fa fa-chevron-right"></i></a>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- End of Shop Table Products -->
                </div>


                <!-- Cart Collaterals -->
                <div class="cart-collaterals">

                    <form class="shipping_calculator pull-left" action="#" method="post">
                        <h2><a href="{{ route('home') }}" class="shipping-calculator-button">Quay Lại <span>↓</span></a></h2>
                    </form>

                    <div class="cart-totals pull-right">
                            <div class="cart-totals-row"><h5 class="cart-total-title">Đơn hàng</h5></div>

                            <div class="cart-totals-row" id="soluong">
                                <span>Số lượng: </span> <span>{{ $sessionCart->getTotalQuantity() }}</span>
                            </div>
                            <div class="cart-totals-row"><span>Vận chuyển:</span> <span>Miễn phí</span></div>
                            <div class="cart-totals-row" id="tongtie    n"><span>Tổng tiền:</span> <span>{{ number_format($sessionCart->getSubToTal(), 0, ",", ",") }} VNĐ</span></div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <!-- End of Cart Collaterals -->
                <div class="clearfix"></div>

        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection

@section('javascript')
    <script type="text/javascript" >

            function updateCart(quantity, id) {
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    type: 'get',
                    data: {quantity: quantity, id: id},
                    success: function (data) {
                        location.reload();
                    }
                })
            }
    </script>
@endsection

