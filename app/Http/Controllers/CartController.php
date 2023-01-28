<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //

    public function add_to_cart(Request $request)
    {

        $request->validate([
            'quantity'  => 'gt:0',
            'product_id' => 'exists:products,id'
        ]);

        $product = product::find($request->product_id);

        cart::updateOrCreate([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
        ], [

            'price' => $product->price,
            'quantity' => DB::raw('quantity  + ' . $request->quantity),
        ]);
        // cart::create([
        //     'price' => $product->price,
        //     'quantity' => $request->quantity,
        //     'product_id' => $request->product_id,
        //     'user_id' => Auth::id(),
        // ]);

        return redirect()->back()->with('msg', 'product added to cart successfully');
    }

    public function cart()
    {
        return view('site.cart');
    }

    public function update_cart(Request $request)
    {
      // dd($request->all());

        foreach($request->qyt as $product_id => $new_qyt) {
        cart::where('product_id', $product_id)
            ->where('user_id', Auth::id())
            ->update(['quantity' => $new_qyt]);
    }
        return redirect()->back();
    }

    public function remove_cart($id)
    {
        cart::destroy($id);

        return redirect()->back();
    }

}
