<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Validator; // Import the Validator class
use Storage; 

class ProductController extends Controller
{
    //
    function index()
    {
        $data=Product::all();
        //return Product::all();//gives you json format....go to resources next
    return view('product',['products'=>$data]);

    }
    function detail($id)
    {
    $data= Product::find($id);
    return view("details", ['product'=>$data]);
    }

    function search(Request $request)
{
    $query = $request->input('query');
    $data = Product::where('name', 'like', '%' . $request->input('query').'%')->get();
    return view('search',['products'=>$data]);
    
}
function addProducts(Request $request)
{
    //return view('addProducts');
    if($request->session()->has('user')) 
        {
            $userId = $request->session()->get('user')['id'];
//validate the request
$request->validate([

    'name' => 'required',
    'price' => 'required',
    'category' => 'required',
    'description' => 'required',
    'gallery_url' => 'required|url', 


]);
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'gallery' => $request->gallery_url,
        ]);
    // Save the product in the database
    $product->save();
//I want to retrieve all the existing input data in te session as an array through te $request and put them under $input
    $input=$request->all();
    return view ('addProducts',['input'=>$input]);
    }
    else{
        return redirect('/login');
    }
 // return view('addProducts');
//redirect back
//return redirect()->route('addProducts');
    
}
    function addToCart(Request $request){
        if($request->session()->has('user')) 
        {
            $userId = $request->session()->get('user')['id'];
        $productId = $request->product_id;

        // Check if the product is already in the cart
        $existingCartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            // If the product is already in the cart, increase the quantity
            $existingCartItem->increment('quantity');
        }
        else {
            // If the product is not in the cart, add it
            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->product_id = $productId;
            $cart->quantity = 1; // Set the initial quantity to 1
            $cart->save();
        }
        return redirect()->route('cart.list');
    } else {
        return redirect('/login');
    }
  
    }
    






// Buy Now
function buyNow(Request $request){
    if ($request->session()->has('user')) {
        $userId = $request->session()->get('user')['id'];

//get the products and quantities in the user's cart
         $cartItems= DB::table('cart')
        ->where('user_id',$userId)
        ->get();

        $totalPrice = 0; // Initialize the total price to 0
         
        foreach($cartItems as $cartItem){
            $product = Product::find($cartItem->product_id);
        if($product){
            //calculate the total price for this product in the cart
            $productTotalPrice = $product->price * $cartItem->quantity;

            // Add the product's total price to the overall total
            $totalPrice += $productTotalPrice;

        }    
        }

        // Perform your logic for the purchase here

        // Clear the cart for the user
        //Cart::where('user_id', $userId)->delete();

        return view('buyNow',['total'=>$totalPrice])->with('success', 'Purchase successful. Cart cleared.');
    } else {
        return redirect('/login');
    }
}

static function cartItem() {
    if (Session::has('user')) {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    return 0; // Return a default value, such as 0, when 'user' session is not set.
}

    function cartList(){
        if (Session::has('user')) {
        $userId = Session::get('user')['id'];

        $products= DB::table('cart')
        ->join('products', 'cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*', 'cart.quantity','cart.id as cart_id')//include the 'cart.quantity in the select..to retrieve the quantity
        ->get();

        return view('cartlist',['products'=>$products]);
}else {
    return redirect('/login');
}
}
function removeCart($cartId){
    Cart::destroy($cartId);
    return redirect('cartList');
}
function orderPlace(Request $request,) {
    // Get the user ID
    $userId = Session::get('user')['id'];

    // Get the cart items for the user
    $cartItems = Cart::where('user_id', $userId)->get();

    $totalPrice = 0; // Initialize the total price to 0
    $orders = []; // Initialize an array to store the orders

    // Loop through cart items to create orders
    foreach ($cartItems as $cart) {
        $order = new Order();
        $order->product_id = $cart->product_id;
        $order->user_id = $userId;
        $order->status = 'pending';
        $order->payment_method = $request->payment;
        $order->payment_status = 'pending';
        $order->address = $request->address;
        $order->save();
    
        // Calculate the total price for this product and add it to the overall total
        $product = Product::find($cart->product_id);
        if ($product) {
            $productTotalPrice = $product->price * $cart->quantity;
            $totalPrice += $productTotalPrice;
        }

        // Add the order to the orders array
        $orders[] = $order;
    }

    // Clear the user's cart after creating the orders
    Cart::where('user_id', $userId)->delete();

    return view('orderPlace', ['orders' => $orders,
    'total' => $totalPrice,]);
}
function sessionData(Request $request){
    if($request->session()->has('user')){
        
        $userId = Session::get('user')['id'];
    }
}
}