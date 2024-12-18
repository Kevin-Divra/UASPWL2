<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

class ShopController extends Controller
{
    public function index() : View
    {
        $product = new Product;
        $data['products'] = $product->get_product()->get();
        $data['categories'] = $product->get_category_product()->get();
        
        return view('user.shop', compact('data'));
    }

    public function query(Request $request)
    {
        $query = $request->input('query'); // Search term
        $category = $request->input('category'); // Category name
        $sortBy = $request->input('sort_by', 'title'); // Default sort by 'title'
        $sortDirection = $request->input('sort_direction', 'asc'); // Default sort direction

        // Start query builder
        $products = Product::query()
            ->select("products.*", "category_product.product_category_name as product_category_name")
            ->join('category_product', 'category_product.id', '=', 'products.product_category_id');

        // Search filter (by title or category name)
        if ($query) {
            $products->where(function ($q) use ($query) {
                $q->whereRaw('LOWER(products.title) LIKE ?', ['%' . strtolower($query) . '%'])
                  ->orWhereRaw('LOWER(category_product.product_category_name) LIKE ?', ['%' . strtolower($query) . '%']);
            });
        }

        // Filter by category
        if ($category) {
            $products->where('category_product.product_category_name', $category);
        }

        // Sorting (by name or price)
        switch ($sortBy) {
            case 'title':
                $products->orderBy('products.title', $sortDirection);
                break;

            case 'price':
                $products->orderBy('products.price', $sortDirection);
                break;

            default:
                $products->orderBy('products.title', 'asc'); // Default sorting
        }

        // Get products and categories
        $data['products'] = $products->get();

        // Return view with results
        return view('user.shop', compact('data'));
    }

}