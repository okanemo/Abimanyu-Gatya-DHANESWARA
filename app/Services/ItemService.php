<?php

namespace App\Services;

use App\Repositories\Item\ItemRepository;
use Exception;
use Illuminate\Support\Facades\Validator;

class ItemService
{
    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index()
    {
        return $this->itemRepository->index();
    }

    public function create()
    {
        return $this->itemRepository->create();
    }

    public function store($data)
    {
        $validator = Validator::make($data, [
            'category'      => 'required',
            'sub_category'  => 'required',
            'name'          => 'required',
            'value'         => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first());
        }

        return $this->itemRepository->store($data);
    }

    public function edit($id)
    {
        return $this->itemRepository->edit($id);
    }

    public function update($data, $id)
    {
        $validator = Validator::make($data, [
            'category'      => 'required',
            'sub_category'  => 'required',
            'name'          => 'required',
            'value'         => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first());
        }

        return $this->itemRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->itemRepository->destroy($id);
    }

    public function subCategory($data)
    {
        return $this->itemRepository->subCategory($data);
    }
}