<?php

namespace App\Repositories\Item;

use App\Models\Category;
use App\Models\Item;
use App\Models\SubCategory;
use App\Models\User;
use App\Repositories\Item\ItemRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ItemRepository implements ItemRepositoryInterface
{
    protected $item, $subCategory, $category, $user;

    public function __construct(Item $item, SubCategory $subCategory, Category $category, User $user)
    {
        $this->item         = $item;
        $this->subCategory  = $subCategory;
        $this->category     = $category;
        $this->user         = $user;
    }

    public function index()
    {
        // get user id
        $id = Auth::user()->id;

        // get items
        $items = $this->item->query();

        if (Auth::user()->account_type != '1') {
            $items  = $items
                    ->where('user_id', $id);
        }

        $items  = $items
                ->with(['category', 'sub_category', 'user'])
                ->paginate(10);

        return $items;
    }

    public function create()
    {
        // get categories
        $categories     = $this->category->get();

        // get categories
        $subCategories  = $this->subCategory->get();

        // get users
        $users          = $this->user->where('account_type', '2')->get();

        // compacts
        $compacts = [
            "categories"    => $categories,
            "subCategories" => $subCategories,
            "users"         => $users
        ];

        return $compacts;
    }

    public function store($data)
    {
        // user
        $user = Auth::user()->id;
        
        if (Auth::user()->account_type == '1') {
            $user = $data['user'];
        }

        // insert into items table
        $item = $this->item;

        $item->user_id          = $user;
        $item->category_id      = $data['category'];
        $item->sub_category_id  = $data['sub_category'];
        $item->name             = $data['name'];
        $item->value            = $data['value'];

        $item->save();

        return $item;
    }

    public function edit($id)
    {
        // get item
        $item = $this->item->find($id);

        // get users
        $users          = $this->user->where('account_type', '2')->get();
        // get category
        $categories     = $this->category->get();
        // get category
        $subCategories  = $this->subCategory->get();

        // compacts
        $data = [
            'item'          => $item,
            'users'         => $users, 
            'categories'    => $categories,
            'subCategories' => $subCategories
        ];

        return $data;
    }

    public function update($data, $id)
    {
        // user
        $user = Auth::user()->id;
        
        if (Auth::user()->account_type == '1') {
            $user = $data['user'];
        }

        // update item
        $item = $this->item->find($id);

        $item->user_id          = $user;
        $item->category_id      = $data['category'];
        $item->sub_category_id  = $data['sub_category'];
        $item->name             = $data['name'];
        $item->value            = $data['value'];

        $item->save();

        return $item;
    }

    public function destroy($id)
    {
        // delete item
        $item = $this->item->findOrFail($id);

        $item->delete($id);

        return $item;
    }

    public function subCategory($data)
    {
        $category_id = $data['category_id'];

        // get sub categories
        $subCategories  = $this->subCategory
                        ->where('category_id', $category_id)
                        ->get();
        
        return $subCategories;
    }
}