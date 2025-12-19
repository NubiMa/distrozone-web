<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with(['category', 'primaryImage', 'variants'])
            ->where('is_active', true)
            ->where('is_featured', true)
            ->limit(4)
            ->get();

        return view('welcome', compact('featuredProducts'));
    }
}