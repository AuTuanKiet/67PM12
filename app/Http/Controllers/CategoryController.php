<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')->orderBy('id')->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateCategory($request);

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Thêm danh mục mới thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $availableParents = $this->getAvailableParents($category);

        return view('admin.category.edit', compact('category', 'availableParents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $data = $this->validateCategory($request, $category);

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công!');
    }

    private function validateCategory(Request $request, ?Category $category = null): array
    {
        $descendantIds = $category ? $this->getDescendantIds($category) : [];

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'parent_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
                function ($attribute, $value, $fail) use ($category, $descendantIds) {
                    if (!$category || $value === null || $value === '') {
                        return;
                    }

                    if (in_array($value, $descendantIds, true)) {
                        $fail('Danh mục cha không thể là con cháu của danh mục hiện tại!');
                    }
                }
            ],
            'is_active' => 'nullable|boolean',
            'is_delete' => 'nullable|boolean',
        ]);

        $data['parent_id'] = $data['parent_id'] ?? null;
        $data['is_active'] = $request->boolean('is_active', true);
        $data['is_delete'] = $request->boolean('is_delete', false);

        return $data;
    }

    private function getDescendantIds(Category $category): array
    {
        $descendants = [];

        $children = Category::where('parent_id', $category->id)->get(['id']);
        foreach ($children as $child) {
            $descendants[] = $child->id;
            $descendants = array_merge($descendants, $this->getDescendantIds($child));
        }

        return $descendants;
    }

    private function getAvailableParents(?Category $category = null)
    {
        $query = Category::orderBy('name');

        if (!$category) {
            return $query->get();
        }

        $excludedIds = array_merge([$category->id], $this->getDescendantIds($category));

        return $query->whereNotIn('id', $excludedIds)->get();
    }
}
