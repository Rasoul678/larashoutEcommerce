<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function create()
    {
//        $categories = Category::all($columns, $order, $sort);
        $categories = Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');

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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetCategory = Category::findOrFail($id);
//        $categories = Category::all($columns, $order, $sort);
        $categories = Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');

        return view('admin.categories.edit', compact('categories', 'targetCategory'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
        ]);

        $params = $request->except('_token');

        $category = Category::findOrFail($params['id']);

        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'featured'));

        $category->update($merge->all());

        return redirect(route('admin.categories.index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect(route('admin.categories.index'));
    }
}
