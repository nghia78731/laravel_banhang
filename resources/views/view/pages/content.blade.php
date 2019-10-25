@extends('view.layout.index')

@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{ count($products) }} sản phẩm mới</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($products as $product)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if ($product->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif

                                            <div class="single-item-header">
                                                <a href="{{ route('product', $product->id) }}"><img width="320px" height="270px" src="{{ asset('images/product'. '/'. $product->image) }}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $product->name }}</p>
                                                <p class="single-item-price">
                                                    @if ($product->promotion_price != 0)
                                                        <span class="flash-del">{{ number_format($product->unit_price, 0, '', ',') }}VNĐ</span>
                                                        <span class="flash-sale">{{ number_format($product->promotion_price, 0, '', ',') }}VNĐ</span>
                                                    @else
                                                        <span class="flash-sale">{{ number_format($product->unit_price, 0, '', ',') }}VNĐ</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{ route('cart.store') }}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{ route('product', $product->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                        <div class="row">
                            {{ $products->links() }}
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Iphone</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm Thấy {{ count($iphone) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($iphone as $iphones)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route('product', $iphones->id) }}"><img src="{{ asset('images/product' .'/'. $iphones->image)}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $iphones->name }}</p>
                                            <p class="single-item-price">
                                                <span>{{ number_format($iphones->unit_price, 0, ",", ",") }} VNĐ</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>
@endsection