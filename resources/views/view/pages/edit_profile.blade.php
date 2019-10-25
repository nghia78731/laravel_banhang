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
                            <h4 style="text-align: center">Chỉnh sửa thông tin</h4>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{ session('thongbao') }}
                                </div>
                            @endif
                            <div class="beta-products-details">
                                <p class="pull-left"></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <form method="POST" class="edit" action="{{ route('signup.editprofile', $userInfo->id) }}">
                            @csrf
                            <table id="myTable" class="table table-bordered table-hover dataTable" role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th class="">Tên</th>
                                    <th class="">Email</th>
                                    <th class="">Số điện thoại</th>
                                    <th class="">Địa chỉ</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input name="fullname" type="text" value="{{ $userInfo->fullname }}"></td>
                                    <td><input name="email" type="text" value="{{ $userInfo->email }}" disabled="disabled"></td>
                                    <input name="password" type="hidden" value="{{ $userInfo->password }}">
                                    <td><input name="phone" type="text" value="{{ $userInfo->phone }}"></td>
                                    <td><input name="address" type="text" value="{{ $userInfo->address }}"></td>
                                </tr>
                                </tbody>
                            </table>
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
