<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalprice = 0;

        foreach ($cart as $item) {
            $totalprice += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('cart', 'totalprice'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if (!$product || $quantity < 1) {
            return response()->json(['success' => false, 'message' => 'Invalid product or quantity.'], 404);
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "photo" => $product->photo
            ];
        }

        session()->put('cart', $cart);

        $totalprice = 0;
        foreach ($cart as $item) {
            $totalprice += $item['price'] * $item['quantity'];
        }

        return response()->json(['success' => true, 'message' => 'Product added to cart successfully!']);
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                if ($product->stock < $details['quantity']) {
                    return redirect()->route('cart.index')->with('error', 'Stok tidak cukup untuk produk: '. $product->name);
                }
            }
        }

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $product->stock -= $details['quantity'];
                $product->save();
            }
        }
        
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Pembayaran berhasil!', true);
    }
}
