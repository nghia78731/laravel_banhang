@extends('admin.layout.index')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
            </ol>

            @if (session('thongbao'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('thongbao') }}</li>
                    </ul>
                </div>
            @endif

            <h2 style="text-align: center">Chi tiết đơn hàng</h2>
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6"   style="">
                                    <h4></h4>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="col-md-4">Thông tin khách hàng</th>
                                            <th class="col-md-6"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Thông tin người đặt hàng</td>
                                            <td>{{ $customerInfo->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đặt hàng</td>
                                            <td>{{ $customerInfo->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>{{ $customerInfo->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>{{ $customerInfo->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $customerInfo->email }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="">STT</th>
                                <th class="">Tên sản phẩm</th>
                                <th class="">Số lượng</th>
                                <th class="">Giá tiền</th>
                            </thead>
                            <tbody>
                            @foreach($billInfo as $billsInfo)
                                <tr>
                                        <td>{{ $billsInfo->id }}</td>
                                        <td>{{ $billsInfo->product_name }}</td>
                                        <td>{{ $billsInfo->quantity }}</td>
                                        <td>{{ number_format($billsInfo->unit_price, 0, ',', ',') }} VNĐ</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="3"><b>Tổng tiền</b></td>
                                    <td colspan="1"><b class="text-red">{{ number_format($customerInfo->bill_total, 0, ",", ",") }}VNĐ</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Trạng thái</b></td>
                                    <td colspan="1">
                                        <form action="{{ route('adminbill.update', $customerInfo->id) }}" method="POST">
                                            @csrf
                                            <div class="form-inline">
                                                <b>Trạng thái giao hàng: </b>
                                                <select name="status" class="form-control input-inline" style="width: 200px">
                                                    @if($customerInfo->status == "Chưa giao")
                                                        <option value="Chưa giao">Chưa giao</option>
                                                        <option value="Đang giao">Đang giao</option>
                                                        <option value="Đã giao">Đã giao</option>
                                                    @elseif ($customerInfo->status == "Đang giao")
                                                        <option value="Đang giao">Đang giao</option>
                                                        <option value="Đã giao">Đã giao</option>
                                                        @else
                                                        <option value="Đã giao">Đã giao</option>
                                                    @endif
                                                </select>
                                                <input type="submit" value="Xử lý" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
        </div>
    </div>
@endsection