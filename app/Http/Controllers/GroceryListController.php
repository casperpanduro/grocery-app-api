<?php

namespace App\Http\Controllers;

use App\Models\GroceryList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroceryListController extends Controller
{
    public function index(Request $request)
    {
        $lists = GroceryList::get()->all();
        return response()->json($lists);
    }

    public function show($id)
    {
        $list = GroceryList::find($id)->first();
        return response()->json($list);
    }

    public function update(Request $request, $id)
    {

        $list = GroceryList::find($id)->first();

        if ($request->title) {
            $list->title = $request->title;
        }

        $list->save();

        return response()->json($list);
    }
}
