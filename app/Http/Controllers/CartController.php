<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $userId = auth()->user()->userId;
        $id = (int) $request->id;
        $quantity = (int) $request->quantity;
        // will be added later
        $discount = 0;

        $product = Product::find($id);
        $stock = $product->stock;

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Validate the quantity
        if ($quantity < 1) {
            return response()->json(['error' => 'Quantity must be at least 1'], 400);
        } else if ($quantity > $stock) {
            return response()->json(['error' => 'Quantity exceeds available stock'], 400);
        }

        $cart = $request->session()->get('cart_' . $userId, []);

        if (isset($cart[$id])) {
            $cartQuantity = $cart[$id]['quantity'];
            $totalQuantity = $cartQuantity += $quantity;
            if ($cart[$id]['quantity'] > $stock || $totalQuantity > $stock) {
                return response()->json(['error' => 'Quantity exceeds available stock'], 400);
            } else {
                $cart[$id]['quantity'] += $quantity;
            }
        } else {
            $cart[$id] = [
                "prodId" => $id,
                "prodName" => $product->prodName,
                "quantity" => $quantity,
                "discount" => $discount,
                "price" => $product->price,
                "image" => $product->prodImagePath,
            ];
        }

        $request->session()->put('cart_' . $userId, $cart);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!'
        ], 200);
    }

    public function showCart()
    {
        $userId = auth()->user()->userId;
        $cart = session()->get('cart_' . $userId, []);
        return response()->json([
            'success' => true,
            'cart' => $cart
        ], 200);
    }

    public function clearCart()
    {
        $userId = auth()->user()->userId;
        $cartId = 'cart_' . $userId;
        if (session()->has($cartId)) {
            $cart = session($cartId);
            if (empty($cart)) {
                session()->forget($cartId);
                return response()->json(['success' => false, 'message' => 'No items in the cart to clear.', 'type' => 'empty_cart']);
            }
            session()->forget('cart_' . $userId);
            return response()->json(['success' => true, 'message' => 'Cart cleared successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'No items in the cart to clear.', 'type' => 'empty_cart']);
        }
    }

    public function deleteCartItemById(Request $request)
    {
        $userId = auth()->user()->userId;
        $id = $request->productId;

        $cart = $request->session()->get('cart_' . $userId, []);
        $message = 'Item not found in cart';
        if (isset($cart[$id])) {
            $productName = $cart[$id]['prodName'];
            unset($cart[$id]);
            $request->session()->put('cart_' . $userId, $cart);
            $message = "$productName deleted successfully";
        }

        return response()->json(['success' => true, 'message' => $message]);
    }
}
