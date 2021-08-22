<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function index();
    public function store($data);
    public function edit($id);
    public function update($data, $id);
    public function destroy($id);
}