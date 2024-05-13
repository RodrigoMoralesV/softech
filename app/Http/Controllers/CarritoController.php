<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{

    public function viewCart(Request $request)
{
    // Get the cart from the session
    $cart = $request->session()->get('cart', []);
    
    $total = 0;
    $cartItems = [];
    // Loop through each item in the cart
    foreach ($cart as $productId => $item) {
        // Get the product details from the item
        $product = $item['product'];
        // Create an array with the product details
        $productDetails = [
            'image' => $product->galeria_imagenes_productos,
            'name' => $product->descripcion_producto,
            'price'=> $product->valor_unitario,
            'value' => $product->Descuento_producto,
        ];
        // Add the product details to the cart items array
        $cartItems[] = $productDetails;

        $subtotal = $product->price * $item['quantity'];
        $total += $subtotal;
    }
    
    // Pass both $cart and $cartItems to the view
    return view('carrito/cart', compact('cart', 'cartItems','total'));
    return response()->json($cartItems, 200);
}

    public function addToCart(Request $request, $productId)
    {
        // Retrieve the product with the given ID from the database
        $product = Producto::find($productId);

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Get the cart from the session or create a new one if it doesn't exist
        $cart = $request->session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // Increment the quantity of the existing product in the cart
            $cart[$productId]['quantity']++;
        } else {
            // Add the product to the cart with a quantity of 1
            $cart[$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }

        // Store the updated cart in the session
        $request->session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart'], 200);
    }

    public function removeFromCart(Request $request, $productId)
    {
        // Get the cart from the session
        $cart = $request->session()->get('cart', []);
        
        // Check if the product exists in the cart
        if (isset($cart[$productId])) {
            // Remove the product from the cart
            unset($cart[$productId]);
            
            // Store the updated cart in the session
            $request->session()->put('cart', $cart);
            
            return response()->json(['message' => 'Product removed from cart'], 200);
        } else {
            return response()->json(['message' => 'Product not found in cart'], 404);
        }
    }
    
}
