@extends('admin.layout.index')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Danh sách đơn hàng</li>
            </ol>

            @if (session('thongbao'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('thongbao') }}</li>
                    </ul>
                </div>
            @endif

            <h2 style="text-align: center">Danh sách đơn hàng</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên người order</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customer as $customers)

                    <tr>
                        <td>{{ $customers->id }}</td>
                        <td>{{ $customers->name }}</td>
                        <td>{{ $customers->address }}</td>
                        <td>{{ $customers->created_at }}</td>
                        @if($customers->status == "Chưa giao")
                            <td class="alert alert-danger">{{ $customers->status }}</td>
                        @elseif($customers->status == "Đang giao")
                            <td class="alert alert-primary">{{ $customers->status }}</td>
                            @else
                            <td class="alert alert-success">{{ $customers->status }}</td>
                        @endif
                        <td><a href="{{ route('adminbill.edit', $customers->id) }}">Xem chi tiết</a></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa ko')" href="{{ route('adminbill.destroy', $customers->id) }}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection