<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $products_slider =  product::orderByDesc('id')->take(3)->get();

        $categories =  Category::orderByDesc('id')->take(3)->get();

        $products_latest =  product::orderByDesc('id')->take(9)->offset(3)->get();


        return  view('site.index', compact('products_slider', 'categories', 'products_latest'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function shop()
    {
        $products = Product::orderByDesc('id')->paginate(3);

        return view('site.shop', compact('products'));
    }

    public function category($id)
    {
        $category = Category::FindOrFail($id);

        $products = $category->product()->orderByDesc('id')->paginate(3);

        return view('site.shop', compact('products', 'category'));
    }

    public function contact()
    {
        return view('site.contact');
    }
}