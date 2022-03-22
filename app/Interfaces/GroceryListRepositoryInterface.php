<?php
namespace App\Interfaces;

interface GroceryListRepositoryInterface
{
    public function create($attributes, $user_id);
    public function find($id);
    public function delete($id);
    public function all();
    public function update($id, $attributes);

    // items
    public function addNewListItem(Int $list_id, $title, $user_id);
    public function updateListItem(Int $item_id, $title);
    public function deleteListItem(Int $item_id);
}
