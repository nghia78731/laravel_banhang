@extends('view.layout.index')

@section('content')

    <div class="header-bottom color-div">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
    </div> <!-- #header -->
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a> / <span>Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">

                            @foreach ($typeProducts as $typeProduct)
                                <li>
                                    <a href="{{ route('type-product', [$typeProduct->name_slug, $typeProduct->id]) }}">{{ $typeProduct->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">

                            <div class="beta-products-details">
                                <p class="pull-left">Tìm kiếm sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                        </div> <!-- .beta-products-list -->
                        <div class="row">
                            @foreach ($data as $datas)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        @if ($datas->promotion_price != 0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>
                                        @endif

                                        <div class="single-item-header">
                                            <a href="{{ route('product', $datas->id) }}"><img width="320px" height="270px" src="{{ asset('images/product'. '/'. $datas->image) }}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $datas->name }}</p>
                                            <p class="single-item-price">
                                                @if ($datas->promotion_price != 0)
                                                    <span class="flash-del">{{ $datas->unit_price }}VNĐ</span>
                                                    <span class="flash-sale">{{ $datas->promotion_price }}VNĐ</span>
                                                @else
                                                    <span class="flash-sale">{{ $datas->unit_price }}VNĐ</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route('product', $datas->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">

                        </div>
                        <div class="space50">&nbsp;</div>
                    </div> <!-- end section with sidebar and main content -->


                </div> <!-- .main-content -->
            </div> <!-- #content -->
        </div> <!-- .container -->

@endsection
