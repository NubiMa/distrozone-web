<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'primaryImage', 'variants'])
            ->where('is_active', true);

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by search keyword
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('base_price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('base_price', '<=', $request->max_price);
        }

        // Filter featured
        if ($request->has('featured') && $request->featured) {
            $query->where('is_featured', true);
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        $allowedSorts = ['name', 'base_price', 'created_at'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        // Pagination
        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

        return view('products.index', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::with([
            'category',
            'images' => fn($q) => $q->orderBy('sort_order'),
            'variants' => fn($q) => $q->where('is_available', true)
        ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Get related products from same category
        $relatedProducts = Product::with(['category', 'primaryImage', 'variants'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}