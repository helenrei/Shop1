<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductSelection()
    {
        $products = Product::all();

        return view('products.product-selection', compact('products'));
    }

    public function showCart()
    {
        $cartItems = CartItem::with('product')->get();
        $total = 0;

        foreach ($cartItems as $cartItem) {
            $total += $cartItem->quantity * $cartItem->product->price;
        }

        return view('products.cart', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = CartItem::where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->input('quantity');
            $cartItem->save();
        } else {
            $cartItem = new CartItem([
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
            ]);
            $cartItem->save();
        }

        return redirect('/cart');
    }

    public function updateCart(Request $request, $cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect('/cart');
    }

    public function deleteCartItem($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->delete();

        return redirect('/cart');
    }

    public function showPayment()
    {
        return view('products.payment');
    }

    public function processPayment(Request $request)
    {
        // Process payment logic here

        // Clear cart after successful payment
        CartItem::truncate();

        // Flash a success message
        $request->session()->flash('success', 'Payment completed.');

        return redirect()->route('product.selection');
    }
}
