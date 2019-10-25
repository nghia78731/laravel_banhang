@extends('admin.layout.index')

@section('content')
    <div id="content-wrapper">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Danh sách danh mục </li>
            </ol>

            @if (session('thongbao'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('thongbao') }}</li>
                    </ul>
                </div>
            @endif

            <h2 style="text-align: center">Danh sách danh mục</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($typeProducts as $typeProduct)
                    <tr>
                        <td>{{ $typeProduct->name }}</td>
                        <td>{{ $typeProduct->description }}</td>
                        <td><img style="width: 100px; height: 100px" src="{{ asset('images/product').'/'.$typeProduct->image }}"></td>
                        <td><a href="{{ route('dashboard.showedittypeproduct', $typeProduct->id) }}"><i class="fa fa-bath" ></i></a></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa ko')" href="{{ route('dashboard.deleteproduct', $typeProduct->id) }}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection