@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Danh sách sản phẩm</h1>

    @if (session('success'))
        <div style="margin:12px 0; padding:12px; background:#ecfdf3; color:#166534; border-radius:8px; border:1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom:12px; display:flex; gap:10px; align-items:center;">
        <a href="/home" class="btn-home">← Trang chủ</a>
        <a href="{{ route('product.add') }}" class="btn">+ Thêm mới sản phẩm</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
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
                        <td style="display:flex; gap:6px; align-items:center; flex-wrap:wrap;">
                            <a href="{{ route('product.detail', $product->id) }}" class="btn-detail">Chi tiết</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn-edit">Sửa</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection