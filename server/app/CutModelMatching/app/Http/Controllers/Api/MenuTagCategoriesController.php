<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\MenuTagCategoryResponse;
use App\Http\Responses\MenuTagResponse;
use App\MenuTagCategory;
use App\QueryAdapter;
use Illuminate\Http\Request;

class MenuTagCategoriesController extends Controller
{

    public function index(CustomRequest $request)
    {
        $queryAdapter = new QueryAdapter();
        $menuTagCategories = $queryAdapter->execute(MenuTagCategory::class, $request->all());
        $menuTagCategoryResponses = array_map(function ($menuTagCategory) {
            $menuTagCategoryResponse = new MenuTagCategoryResponse();
            $menuTagCategoryResponse->constructWith($menuTagCategory);
            $menuTagCategoryResponse->tags = array_map(function ($menuTag) {
                $menuTagResponse = new MenuTagResponse();
                $menuTagResponse->constructWith($menuTag);
                return $menuTagResponse;
            }, $menuTagCategory->tags->all());
            return $menuTagCategoryResponse;
        }, $menuTagCategories);
        return $menuTagCategoryResponses;
    }
}
