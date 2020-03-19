<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        $categories = Category::all($columns, $order, $sort);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        $categories = Category::all($columns, $order, $sort);

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
        ]);

        $params = $request->except('_token');

        $collection = collect($params);

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'featured'));

        $category = new Category($merge->all());

        $category->save();
        return redirect(route('admin.categories.index'));
    }
}
