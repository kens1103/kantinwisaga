<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request)
    {
        session()->forget('cart');
        return redirect()->route('products.index')->with('success', 'Pembelian berhasil diproses!');
    }
}
