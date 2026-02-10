@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-3">Chỉnh sửa danh mục</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên danh mục <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Hình ảnh (URL)</label>
                    <input type="text" id="image" name="image" class="form-control" value="{{ old('image', $category->image) }}">
                </div>

                <div class="form-group">
                    <label for="parent_id">Danh mục cha</label>
                    <select id="parent_id" name="parent_id" class="form-control">
                        <option value="">-- Không có --</option>
                        @foreach ($availableParents as $parent)
                            <option value="{{ $parent->id }}" {{ (string) old('parent_id', $category->parent_id) === (string) $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $category->is_active ? '1' : '') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Kích hoạt</label>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" id="is_delete" name="is_delete" value="1" class="form-check-input" {{ old('is_delete', $category->is_delete ? '1' : '') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_delete">Đánh dấu xóa</label>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection