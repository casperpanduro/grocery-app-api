<?php

namespace App\Http\Controllers;

use App\Interfaces\GroceryListRepositoryInterface;
use App\Models\GroceryList;
use App\Repositories\GroceryListRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroceryListController extends Controller
{

    /**
     * @var GroceryListRepositoryInterface
     */
    private GroceryListRepositoryInterface $groceryListRepository;

    /**
     * @param GroceryListRepositoryInterface $groceryListRepository
     */
    public function __construct(GroceryListRepositoryInterface $groceryListRepository)
    {
        $this->groceryListRepository = $groceryListRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $lists = $this->groceryListRepository->all();
        return response()->json($lists);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $list = $this->groceryListRepository->find($id);
        return response()->json($list);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $list = $this->groceryListRepository->update($id, $request->all());

        return response()->json($list);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $list = $this->groceryListRepository->delete($id);

        if ($list) {
            return response()->json($list);
        } else {
            return response()->json(['error' => 'Not found'], 404);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $list = $this->groceryListRepository->create($request->all(), $request->user()->id);
        return response()->json($list);
    }

    public function createItem(Int $list_id, Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $item = $this->groceryListRepository->addNewListItem($list_id, $request->input('title'), $request->user()->id);
        return response()->json($item);
    }

    public function updateItem($list_id, $item_id, Request $request)
    {
        $item = $this->groceryListRepository->updateListItem($item_id, $request->input('title'));
        return response()->json($item);
    }

    public function deleteItem($list_id, $item_id)
    {
        $item = $this->groceryListRepository->deleteListItem($item_id);
        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(['error' => 'Not found'], 404);
        }

    }
}
