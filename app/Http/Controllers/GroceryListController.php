<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroceryListController extends Controller
{
    public function index()
    {
        $data = array("test" => "test", "auth" => auth());

        return response()->json($data);
    }
}
