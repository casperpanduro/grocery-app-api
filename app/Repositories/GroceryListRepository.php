<?php
namespace App\Repositories;

use App\Interfaces\GroceryListRepositoryInterface;
use App\Models\GroceryItem;
use App\Models\GroceryList;

class GroceryListRepository implements GroceryListRepositoryInterface
{

    public function create($attributes, $user_id): GroceryList
    {
        $groceryList = new GroceryList();
        $groceryList->title = $attributes['title'];
        $groceryList->user_id = $user_id;
        $groceryList->save();
        return $groceryList;
    }

    public function find($id)
    {
        return GroceryList::with(['items'])->find($id);
    }

    public function delete($id)
    {
        $list = $this->find($id);
        if ($list) {
            $list->delete();
        }
        return $list;
    }

    public function all()
    {
        return GroceryList::get()->all();
    }

    public function update($id, $attributes)
    {
        $list = $this->find($id);

        if (isset($attributes['title'])) {
            $list->title = $attributes['title'];
        }

        $list->save();

        return $list;
    }

    /**
     * @param $list_id
     * @param $title
     * @param $user_id
     * @return GroceryItem
     */
    public function addNewListItem($list_id, $title, $user_id)
    {
        $item = new GroceryItem();
        $item->title = $title;
        $item->user_id = $user_id;
        $item->grocery_list_id = $list_id;
        $item->save();

        return $item;
    }

    public function updateListItem($item_id, $title)
    {
        $item = GroceryItem::find($item_id);

        if ($title) {
            $item->title = $title;
        }

        $item->save();

        return $item;
    }

    public function deleteListItem($item_id)
    {
        $item = GroceryItem::find($item_id);
        if ($item) {
            $item->delete();
        }
        return $item;
    }
}
