<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        return Category::get();
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function update($id , $data)
    {
        $catgory = $this->show($id);

        $catgory->update($data);

        return $catgory;
    }

    public function destory($id)
    {
        $catgory = Category::find($id);

        $catgory->delete();

        return $catgory;
    }
}