@extends('view.layout.index')

@section('content')

    <div class="header-bottom color-div">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
    </div> <!-- #header -->
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h2 class="inner-title">Quản lý tài khoản</h2>
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
                            <li>
                                <h5><a href="{{ route('signup.showprofile') }}">Thông tin cá nhân</a></h5>
                            </li>
                            <li>
                                <h5><a href="a">Quản lý đơn hàng</a></h5>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4 style="text-align: center">Thay đổi mật khẩu</h4>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{ session('thongbao') }}
                                </div>
                            @elseif (session('thongbao1'))
                                <div class="alert alert-danger">
                                    {{ session('thongbao1') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form method="POST" class="edit" action="{{ route('signup.editpassword', $user->id)}}">
                            @csrf
                            <div>
                                <p><label>Mật khẩu hiện tại</label></p>
                                <input style="width: 60%;margin-bottom: 20px;height: 7%" type="password" name="password" placeholder="Vui lòng nhập mật khẩu hiện tại của bạn">
                                <p><label>Mật khẩu mới</label></p>
                                <input style="width: 60%;margin-bottom: 20px;height: 7%" type="password" name="newpassword" placeholder="Nhập mật khẩu mới">
                                <p><label>Nhập lại mật khẩu mới</label></p>
                                <input style="width: 60%;margin-bottom: 20px;height: 7%" type="password" name="newpassword_confirmation" placeholder="Nhập lại mật khẩu mới">
                            </div>
                            <button class="btn btn-dark" style="width: 40%">
                                <p class="alert alert-success">LƯU THAY ĐỔI</p>
                            </button>
                        </form>
                        <div class="space50">&nbsp;</div>

                    </div> <!-- end section with sidebar and main content -->

                </div> <!-- .main-content -->
            </div> <!-- #content -->
        </div> <!-- .container -->
@endsection
