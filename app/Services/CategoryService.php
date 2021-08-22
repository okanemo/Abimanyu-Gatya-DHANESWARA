<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return $this->categoryRepository->index();
    }

    public function store($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first());
        }

        return $this->categoryRepository->store($data);
    }

    public function edit($id)
    {
        return $this->categoryRepository->edit($id);
    }

    public function update($data, $id)
    {
        $validator = Validator::make($data, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first());
        }

        return $this->categoryRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->categoryRepository->destroy($id);
    }
}