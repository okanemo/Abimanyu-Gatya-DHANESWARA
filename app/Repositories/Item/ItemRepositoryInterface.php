<?php

namespace App\Repositories\Item;

interface ItemRepositoryInterface
{
    public function index();
    public function create();
    public function store($data);
    public function edit($id);
    public function update($data, $id);
    public function destroy($id);
    public function subCategory($data);
}