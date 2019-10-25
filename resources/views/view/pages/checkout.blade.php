@extends('view.layout.index')

@section('content')
    <div class="container">
        <div id="content">
            <form action="{{ route('thankyou.store') }}" method="post" class="beta-form-checkout">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Đặt hàng</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="name">Họ tên*</label>
                            <input type="text" name="name" id="name" placeholder="Họ tên" required>
                        </div>
                        <div class="form-block">
                            <label>Giới tính </label>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

                        </div>

                        <div class="form-block">
                            <label for="email">Email*</label>
                            <input type="email" name="email" id="email" required placeholder="expample@gmail.com">
                        </div>

                        <div class="form-block">
                            <label for="adress">Địa chỉ*</label>
                            <input type="text" name="address" id="address" placeholder="Street Address" required>
                        </div>


                        <div class="form-block">
                            <label for="phone">Điện thoại*</label>
                            <input type="text" name="phone_number" id="phone_number" required>
                        </div>

                        <div class="form-block">
                            <label for="notes">Ghi chú</label>
                            <textarea id="note" name="note"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="your-order">
                            <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                            @if (!empty(Cart::getContent()))
                                <div class="your-order-body" style="padding: 0px 10px">
                                    <div class="your-order-item">
                                        <div>
                                            @foreach (Cart::getContent() as $item)
                                                <div class="media">
                                                    <img width="100px" height="100px" src="{{ asset('images/product'. '/'. $item->attributes->image) }}" alt="" class="pull-left">
                                                    <div class="media-body">
                                                        <p class="font-large">{{ $item->name }}</p>
                                                        @if($item->attributes->promotion_price == 0)
                                                            <span class="color-gray your-order-info">{{ number_format($item->price, 0, ",", ",") }} VNĐ</span>
                                                        @else
                                                            <span class="color-gray your-order-info">{{ number_format($item->attributes->promotion_price, 0, ",", ",") }} VNĐ</span>
                                                        @endif
                                                        <span class="color-gray your-order-info">{{ $item->quantity }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="your-order-item">
                                        <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                        <div class="pull-right"><h5 class="color-black">{{ number_format(Cart::getToTal()) }}</h5></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            @endif
                            <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                        <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                        </div>
                                    </li>

                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                        <label for="payment_method_cheque">Chuyển khoản </label>
                                        <div class="payment_box payment_method_cheque" style="display: none;">
                                            Chuyển tiền đến tài khoản sau:
                                            <br>- Số tài khoản: 123 456 789
                                            <br>- Chủ TK: Nguyễn A
                                            <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="beta-btn primary" href="{{ route('thankyou.index') }}">Đặt hàng <i class="fa fa-chevron-right"></i></button>
                            </div>
                        </div> <!-- .your-order -->
                    </div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->


@endsection