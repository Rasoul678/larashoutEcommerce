<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        $products = Product::all($columns, $order, $sort);;

        return view('admin.products.index', compact('products'));
    }


    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        $categories = Category::all($columns, $order, $sort);

        return view('admin.products.create', compact('categories'));
    }


    /**
     * @param StoreProductFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $collection = collect($params);

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product = new Product($merge->all());

        $product->save();

        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }

        return redirect(route('admin.products.index'));
    }

    /**
     * @param $id
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        $product = Product::findOrFail($id);

        $categories = Category::all($columns, $order, $sort);

        return view('admin.products.edit', compact('categories', 'product'));
    }


    /**
     * @param StoreProductFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = Product::findOrFail($params['product_id']);

        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status', 'featured'));

        $product->update($merge->all());

        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }

        return redirect(route('admin.products.index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect(route('admin.products.index'));
    }
}
