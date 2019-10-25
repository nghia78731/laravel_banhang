@extends('admin.layout.index')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Thêm danh mục</li>
            </ol>

            <h2 style="text-align: center" >Thêm danh mục</h2>
            <form class="form-group" action="{{ route('dashboard.addtypeproduct') }}" enctype="multipart/form-data" method="post">
                @csrf

                @if (session()->has('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" name="name" style="width: 100%">
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" name="description" style="width: 100%">
                </div>

                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="image" style="width: 100%">
                </div>

                <button type="submit" class="btn btn-success">Thêm</button>

            </form>



        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2018</span>
                </div>
            </div>
        </footer>

    </div>
    </div>
@endsection