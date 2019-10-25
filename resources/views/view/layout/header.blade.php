<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel </title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/dest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/responsive.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/css/animate.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/huong-style.css') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>

<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">

            </div>

            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if (\Illuminate\Support\Facades\Auth::check())

                        <li >
                            <a href="{{ route('signup.showprofile') }}"><i class="fa fa-user"></i>{{ \Illuminate\Support\Facades\Auth::user()->fullname }}
                            </a>
                        </li>
                        <li><a href="{{ route('signup.logout') }}">Đăng xuất</a></li>

                    @else
                        <li><a href="{{ route('signup.index') }}">Đăng kí</a></li>
                        <li><a href="{{ route('signup.showlogin') }}">Đăng nhập</a></li>
                    @endif
                </ul>

            </div>

        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="{{ asset('images/slide/banner4.jpg') }}" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{ route('search') }}">
                        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select">
                            <i class="fa fa-shopping-cart"></i>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <a href="{{ route('cart.store') }}">
                                    <span>Giỏ Hàng ({{ Cart::session(\Illuminate\Support\Facades\Auth::id())->getContent()->count() }})</span>
                                </a>
                            @else
                                <span>Trống</span>
                            @endif
                            <i class="fa fa-chevron-down"></i>
                        </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                            <ul class="sub-menu">
                                @foreach ($typeProducts as $typeProduct)
                                    <li>
                                        <a href=" {{ route('type-product', [$typeProduct->name_slug, $typeProduct->id]) }} ">{{ $typeProduct->name }}</a>
                                    </li>
                                @endforeach
                            </ul>

                    </li>
                    <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('contacts') }}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
