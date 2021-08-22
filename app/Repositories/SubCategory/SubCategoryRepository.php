<?php

namespace App\Repositories\SubCategory;

use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\SubCategory\SubCategoryRepositoryInterface;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    protected $subCategory, $category;

    public function __construct(SubCategory $subCategory, Category $category)
    {
        $this->subCategory  = $subCategory;
        $this->category     = $category;
    }

    public function index()
    {
        $subCategory    = $this->subCategory
                        ->with('category')
                        ->paginate(10);

        return $subCategory;
    }

    public function create()
    {
        $categories = $this->category->get();

        return $categories;
    }

    public function store($data)
    {
        $subCategory = $this->subCategory;

        $subCategory->category_id   = $data['category'];
        $subCategory->name          = $data['name'];

        $subCategory->save();

        return $subCategory;
    }

    public function edit($id)
    {
        $subCategory = $this->subCategory->find($id);

        // get category
        $categories = $this->category->get();

        // compacts
        $data = [
            'subcategory'   => $subCategory,
            'categories'    => $categories
        ];

        return $data;
    }

    public function update($data, $id)
    {
        $subCategory = $this->subCategory->find($id);

        $subCategory->category_id   = $data['category'];
        $subCategory->name          = $data['name'];

        $subCategory->save();

        return $subCategory;
    }

    public function destroy($id)
    {
        $subCategory = $this->subCategory->findOrFail($id);

        $subCategory->delete($id);

        return $subCategory;
    }
}