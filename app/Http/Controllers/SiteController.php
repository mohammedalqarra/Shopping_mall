<?php

namespace App\Http\Controllers;

use App\Models\review;
use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function search(Request $request)
    {
        $products = Product::orderByDesc('id')->where('name', 'like', '%' . $request->q . '%')->paginate(3);

        return view('site.search', compact('products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            abort(404);
        }

        $next = Product::where('id', '>', $product->id)->first();
        $prev = Product::where('id', '<', $product->id)->orderByDesc('id')->first();

        return view('site.product', compact('product', 'next', 'prev'));
    }

    public function product_review(Request $request)
    {
        review::create([
            'comment' => $request->comment,
            'star' => $request->rating,
            'product_id' => $request->product_id,
            'user_id'  => Auth::id(),
        ]);

        return redirect()->back();
    }
}