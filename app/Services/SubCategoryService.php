<?php

namespace App\Services;

use App\Repositories\SubCategory\SubCategoryRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class SubCategoryService
{
    protected $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function index()
    {
        return $this->subCategoryRepository->index();
    }

    public function create()
    {
        return $this->subCategoryRepository->create();
    }

    public function store($data)
    {
        $validator = Validator::make($data, [
            'name'      => 'required',
            'category'  => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first());
        }

        return $this->subCategoryRepository->store($data);
    }

    public function edit($id)
    {
        return $this->subCategoryRepository->edit($id);
    }

    public function update($data, $id)
    {
        $validator = Validator::make($data, [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first());
        }

        return $this->subCategoryRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->subCategoryRepository->destroy($id);
    }
}