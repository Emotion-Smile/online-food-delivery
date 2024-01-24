<?php

namespace App\Http\Controllers\Api\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuItemModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetMenuItemController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $menuItems = MenuItemModel::all();
        return response()->json($menuItems);
    }
}
