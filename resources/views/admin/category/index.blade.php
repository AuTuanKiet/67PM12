@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Danh sách danh mục</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('category.add') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm mới danh mục
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Danh mục cha</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Đã xóa</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent?->name ?? '-' }}</td>
                            <td>{{ $category->description ?? '-' }}</td>
                            <td>
                                @if ($category->is_active)
                                    <span class="badge badge-success">Kích hoạt</span>
                                @else
                                    <span class="badge badge-secondary">Tắt</span>
                                @endif
                            </td>
                            <td>
                                @if ($category->is_delete)
                                    <span class="badge badge-danger">Đã xóa</span>
                                @else
                                    <span class="badge badge-info">Bình thường</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Chưa có danh mục</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection