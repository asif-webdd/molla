<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index(){
        $categories = Category::select('id', 'root', 'name', 'slug', 'status')->where('root', 0)->get();
        $cartItems = Cart::getContent();

        if (Cart::getSubTotal() > 0) return view('frontend.cart.index', compact('cartItems', 'categories'));

        return redirect()->route('index');
    }


    public function store(Request $request){

        $product = Product::with('category')
            ->where('slug', $request->slug)
            ->where('status', Product::ACTIVE)
            ->first();

        if ($product) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => [
                    'image' => $product->thumbnail
                ]
            ]);

            return response()->json([
                'status' => true,
                'message' => "You have added " . $product->name . " to your shopping cart!",
                'cart_count' => Cart::getContent()->count(),
                'product' => [
                    'name' => $product->name
                ],
            ]);
        }

        return response()->json([
            'error' => 'Product Not Found!',
        ], 404);
    }



    public function destory($id){
        Cart::remove($id);

        return response()->json([
            'status' => true,
            'message' => "Remove Successfully!",
            'cart_count' => Cart::getContent()->count(),
        ]);
    }


    public function checkout(){
        $categories = Category::select('id', 'root', 'name', 'slug', 'status')->where('root', 0)->get();#

        return view('frontend.checkout.index', compact('categories'));
    }


    public function new_order(Request $request){
        dd($request->all());
    }


}
