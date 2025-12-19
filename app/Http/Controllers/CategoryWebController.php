<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryWebController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->withCount('products')
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function show(string $slug)
    {
        $category = Category::with(['products' => function ($q) {
            $q->where('is_active', true)
              ->with(['primaryImage', 'variants']);
        }])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('categories.show', compact('category'));
    }
}