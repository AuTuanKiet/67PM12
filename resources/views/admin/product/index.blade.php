@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Danh sách sản phẩm</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="/home" class="btn btn-secondary">
            <i class="fas fa-home"></i> Trang chủ
        </a>
        <a href="{{ route('product.add') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm mới sản phẩm
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá (VNĐ)</th>
                        <th>Số lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Chi tiết
                                </a>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection