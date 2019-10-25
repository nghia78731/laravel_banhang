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
                <h2  class="inner-title">Quản lý tài khoản</h2>
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
                                    <h5><a href="">Quản lý đơn hàng</a></h5>
                                </li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                                <h4 style="text-align: center">Thông tin cá nhân</h4>
                                <div class="beta-products-details">
                                    <p class="pull-left"></p>
                                <div class="clearfix"></div>
                                </div>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="">Tên</th>
                                <th class="">Email</th>
                                <th class="">Số điện thoại</th>
                                <th class="">Địa chỉ</th>
                            </thead>
                            <tbody>
                                <tr>
                                        <td>{{ $userInfo->fullname }}</td>
                                        <td>{{ $userInfo->email }}</td>
                                        <td>{{ $userInfo->phone }}</td>
                                        <td>{{ $userInfo->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="next-btn next-btn-warning next-btn-normal next-btn-large" style="width: 40%">
                            <a href="{{ route('signup.showeditprofile') }}">SỬA THÔNG TIN</a>
                        </button>
                        <button class="next-btn next-btn-warning next-btn-normal next-btn-large" style="width: 40%">
                            <a href="{{ route('signup.showeditpassword') }}">ĐỔI MẬT KHẨU</a>
                        </button>
                        <div class="space50">&nbsp;</div>
                    </div> <!-- end section with sidebar and main content -->


                </div> <!-- .main-content -->
            </div> <!-- #content -->
        </div> <!-- .container -->


@endsection
