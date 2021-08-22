<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $category = $this->category->paginate(10);

        return $category;
    }

    public function store($data)
    {
        $category = $this->category;

        $category->name = $data['name'];

        $category->save();

        return $category;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);

        return $category;
    }

    public function update($data, $id)
    {
        $category = $this->category->find($id);

        $category->name = $data['name'];

        $category->save();

        return $category;
    }

    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);

        $category->delete($id);

        return $category;
    }
}