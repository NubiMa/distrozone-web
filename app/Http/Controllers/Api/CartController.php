<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display shopping cart
     */
    public function index()
    {
        $cart = Cart::with(['items.productVariant.product.primaryImage'])
            ->where('user_id', auth()->id())
            ->first();

        $cartItems = $cart ? $cart->items : collect();
        
        // Calculate totals
        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('customer.cart', compact('cartItems', 'subtotal'));
    }

    /**
     * Add item to cart
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Get or create cart
        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        // Get variant
        $variant = ProductVariant::findOrFail($validated['product_variant_id']);

        // Check stock
        if ($variant->stock < $validated['quantity']) {
            return redirect()->back()->with('error', 'Insufficient stock available.');
        }

        // Check if item already exists in cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_variant_id', $variant->id)
            ->first();

        if ($cartItem) {
            // Update quantity
            $newQuantity = $cartItem->quantity + $validated['quantity'];
            
            if ($newQuantity > $variant->stock) {
                return redirect()->back()->with('error', 'Cannot add more than available stock.');
            }

            $cartItem->update([
                'quantity' => $newQuantity,
                'price' => $variant->price,
            ]);
        } else {
            // Create new cart item
            CartItem::create([
                'cart_id' => $cart->id,
                'product_variant_id' => $variant->id,
                'quantity' => $validated['quantity'],
                'price' => $variant->price,
            ]);
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        $cart = Cart::where('user_id', auth()->id())->firstOrFail();
        
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('id', $id)
            ->with('productVariant')
            ->firstOrFail();

        // If quantity is 0, remove item
        if ($validated['quantity'] == 0) {
            $cartItem->delete();
            return redirect()->route('customer.cart')->with('success', 'Item removed from cart.');
        }

        // Check stock
        if ($validated['quantity'] > $cartItem->productVariant->stock) {
            return redirect()->back()->with('error', 'Insufficient stock available.');
        }

        // Update quantity
        $cartItem->update([
            'quantity' => $validated['quantity'],
        ]);

        return redirect()->route('customer.cart')->with('success', 'Cart updated.');
    }

    /**
     * Remove item from cart
     */
    public function destroy(int $id)
    {
        $cart = Cart::where('user_id', auth()->id())->firstOrFail();
        
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return redirect()->route('customer.cart')->with('success', 'Item removed from cart.');
    }
}   