@extends('admin.layout.index')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Charts</li>
            </ol>

            <h2 style="text-align: center" >Sửa danh mục sản phẩm</h2>

            <form class="form-group" method="POST" action="{{ route('dashboard.showedittypeproduct', $typeProduct->id) }}">

                @if (session()->has('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif

                @csrf
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="id_type">
                        @foreach ($typeProducts as $typeProduct)
                            <option value="{{ $typeProduct->id }} " >{{ $typeProduct->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" name="description" style="width: 100%" value="{{ $typeProduct->description }}">
                </div>


                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="image" style="width: 100%" value="{{ $typeProduct->image }}">
                </div>

                <button type="submit" class="btn btn-success">Sửa</button>

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
<!-- /.content-wrapper -->