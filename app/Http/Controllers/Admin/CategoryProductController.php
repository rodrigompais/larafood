<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;

        $this->middleware(['can:products']);
    }

    public function categories($idProduct)
    {
        if (!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', compact('product', 'categories'));
    }

    public function products($idCategory)
    {
        if (!$category = $this->category->find($idCategory)) {
            return redirect()->back();
        }

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }

    public function categoriesAvailable(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        $filter = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', compact('product', 'categories','filter'));
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma Categoria!');
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    public function detachCategoryProduct($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if (!$product || !$category) {
            return redirect()->back();
        }

        $product->categories()->detach($category);

        return redirect()
                    ->route('products.categories', $product->id)
                    ->with('message', 'Desvinculado com sucesso!');
    }
}
