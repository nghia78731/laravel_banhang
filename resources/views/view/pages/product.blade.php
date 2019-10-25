@extends('view.layout.index')

@section('content')
    <body>
    <div class="inner-header">
        <div class="container">
            @foreach ($products as $product)
                <div class="pull-left">
                    <h3 class="inner-title">{{ $product->Type_Products->name }}</h3>
                </div>
                <div class="pull-right">
                    <div class="beta-breadcrumb font-large">
                        <div class="alert alert-dark" role="alert">
                            <a class="alert-link" href="{{ route('home') }}">Home</a> / <span>{{ $product->Type_Products->name }}</span>
                        <div>
                    </div>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                @foreach ($products as $product)
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/product'). '/'. $product->image }}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title"><h4>{{ $product->name }}</h4></p>
                                <p class="single-item-price">
                                    @if ($product->promotion_price == 0)
                                        <span style="color: red">{{ $product->unit_price }}</span>
                                    @else
                                        <span style="color: red">{{ number_format($product->promotion_price) }} VNĐ</span>
                                    @endif
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="space20">&nbsp;</div>
                        </div>
                    </div>
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="image" value="{{ $product->image }}">
                        <input type="hidden" name="promotion_price" value="{{ $product->promotion_price }}">
                        @if ($product->promotion_prince == 0)
                            <input type="hidden" name="prince" value="{{ $product->unit_price }}">
                        @else
                            <input type="hidden" name="prince" value="{{ $product->promotion_prince }}">
                        @endif
                        <button type="submit" class="button button-plain">
                            <strong style="color: #666; text-align: center  ">ĐẶT HÀNG ONLINE</strong>
                        </button>
                    </form>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Chi tiết</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                          <p>{{ $product->description }}</p>
                        </div>

                    </div>
                @endforeach
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>

                        <div class="row">
                            @foreach($randomProduct as $randomProducts)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route('product', $randomProducts->id) }}"><img width="320px" height="270px" src="{{ asset('images/product'). '/'. $randomProducts->image }}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $randomProducts->name }}</p>
                                            <p class="single-item-price">
                                                <span>{{ number_format($randomProducts->unit_price, 0, ",", ",") }} VNĐ</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Sản phẩm bán chạy nhất</h3>
                        <div class="widget-body">
                            @foreach($randomProduct as $randomProducts)
                                <div class="beta-sales beta-lists">
                                    <div class="media beta-sales-item">
                                        <a class="pull-left" href="{{ route('product', $randomProducts->id) }}"><img width="150px" height="150px" src="{{ asset('images/product'). '/'. $randomProducts->image }}" alt=""></a>
                                        <div class="media-body">
                                            <p>{{ $randomProducts->name }}</p>
                                            <span class="beta-sales-price">{{ number_format($randomProducts->unit_price, 0, ",", ",") }} VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- best sellers widget -->

                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
