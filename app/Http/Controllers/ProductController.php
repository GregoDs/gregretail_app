<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Validator; // Import the Validator class
use Storage;
use Termwind\Components\Raw;

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
//Not Recommended 
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



   // Remove the $request parameter from the cartItem method
 static function cartItem()
{
    // The cart count logic is here 
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

//Remove from Cart in database...DESTROY
    function removeCart($cartId){
        Cart::destroy($cartId);
        return redirect('cartList');
    }



    function orderPlace(Request $request) {
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
        
            // Calculate the total price for this product and add it to the overall total...for the receipt purpose
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



    //a more recommended method...to avoid logging up the Database and making it slow....store cart details in a session
   
   
    public function addToCartSession(Request $request)
    {//checks whether there is a user in session
        if ($request->session()->has('user')) {
            $userId = $request->session()->get('user')['id'];
    //get the product_id from  session request and store it in $productId
            $productId = $request->product_id;
    
            //checks whether the session has cart details 
            if ($request->session()->has('cart')) {
                //if present...gets the cart details from the session and stores it under variable $cart
                $cart = $request->session()->get('cart');
            } else {
                //if not....create a new array to store new cart details
                $cart = [];
            }
    //check if the array key speciffically $productId exists in the array $cart 
            if (array_key_exists($productId, $cart)) {
                //if true ....it increases quantity of the product via the product id 
                $cart[$productId]['quantity'] += 1;
            } else {
                //if not....it attempts to find the product details in the product model...via the $productId
                $product = Product::find($productId);

                if ($product) {
                    // If a product is present, it creates an associative array with two elements product id and quantity, which is added to the cart
                    $cart[$productId] = [
                        'product' => $product,
                        'quantity' => 1,
                    ];
                } else {
                    // If the product is not found, handle this situation (e.g., display an error message, log an error, etc.)
                }
                
            }
    //Stores the cart details inside the Session
            $request->session()->put('cart', $cart);
    
            return redirect()->route('cartListSession');
        } else {
            return redirect('/login');
        }
    }
    

function cartListSession(Request $request){
    if($request->session()->has('cart'))
    {
        //if session has cart details...proceed to get the details
        $cart=$request->session()->get('cart');
        $product=[];//create an empty array..for storing th products...remember..we are not stroing and finding products in the database

        //iterate throughthe cartlist items
        foreach($cart as $product_id=>$item){
            //put products inside the array

            $product[]=[
                'product'=>$item['product'],
                'quantity'=>$item['quantity'],
            ];
        }
        return view('cartListSession',['products' => $product]);
    }
    return redirect('/login');
}
//Clear Cart Session
function clearCartSession(Request $request)
{
    $cart=$request->session()->has('cart');
    if($cart)
    {
        $request->session()->forget('cart');
    }
    return redirect('/index');
}



static function cartItemSession(Request $request){
    
    if($request->session()->has('cart'))
    {
        //if session has cart details...proceed to get the details
        $cart=$request->session()->get('cart');

$cartItems=0;//initialize the cart items


//iterate through the cartitems
foreach($cart as $item){
    $cartItems+=$item['quantity'];
}

        return($cartItems);
}else{
    return 0;
}
}


public function removeItemFromCart(Request $request)
{
   // Retrieve the current cart from the session; create an empty array if it doesn't exist
if($request->session()->has('cart'))
     {
        $cart=$request->session()->get('cart',[]); 
        $cartItems = 0;

        foreach ($cart as $productId => &$item) { // Use &$item to modify the original array
            // Perform logic for removing items in the cart
            if ($item['quantity'] > 1) {
                $item['quantity'] -= 1;
            } else {
                unset($cart[$productId]);
            }
            // Update the total cart items
            $cartItems += $item['quantity'];
        }

        // Reindex the array
      //  $cart = array_values($cart);

        // Store the updated cart in the session
        session(['cart' => $cart]);
    }

    return redirect()->route('cartListSession');
}


public function buyNowSession(Request $request)
{
    if($request->session()->has('user'))
    {
        $userId = $request->session()->get('user')['id'];
//get the cart items from the session
$cart=$request->session()->get('cart');

$totalPrice=0;//initialize totalprice to zero

 // You can now process the cart items
 foreach ($cart as $productId => $item) {
    // For each item in the cart, you can process it as needed
    $product = Product::find($productId);
    
    //my Purchase Logic
    $productTotalPrice=$product->price * $item['quantity'];
    $totalPrice+=$productTotalPrice;

    // You can also remove the purchased items from the session cart if needed
   // unset($cart[$productId]);
}

// Update the cart in the session (if you removed purchased items)
$request->session()->put('cart', $cart);

// Redirect to a "Thank You" page or wherever you want to go after the purchase
return view('buyNowSession',['cart'=>$cart,'total' => $totalPrice,]);
} else {
// Redirect to the login page if the user is not authenticated
return redirect('/login');
}
    }



    public function placeOrderFromSession(Request $request)
{
    if (!$request->session()->has('user')) {
        // Redirect to the login page if the user is not authenticated
        return redirect('/login');
    }

    // Get the authenticated user
    $user=$request->session()->get('user');
   //or // $user = auth()->user();

    if (!$user) {
        // if user is not authenticated 
        return redirect('/login');
    }

    // Get the cart items from the session
    $cart = $request->session()->get('cart', []);

    // Initialize total price to zero
    $totalPrice = 0;
    $order_id = 0;
    $userName = 0;
    $Date= 0;

    //get the usersname from the user database table...via model
    $userName= User::find($user->id)->name;


    // Create orders based on the cart items...loop through the cart
    foreach ($cart as $productId => $item) {
        // Find the product in the database via the product model
        $product = Product::find($item['product']['id']);

        if ($product) {
            // Calculate the total price for this product..if it is present
            $productTotalPrice = $product->price * $item['quantity'];
            $totalPrice += $productTotalPrice;

            // Create an order for this product
            $order = new Order();//mass assign...and fill in database..order table
            $order->fill([
                'user_id' => $user->id,
                'product_id' => $item['product']['id'],
                'status' => 'pending',
                'payment_method' => $request->payment,
                'payment_status' => 'pending',
                'address' => $request->address,
            ]);
            $order->save();

            //get the order details...and other details for viewing
            $order_id=$order->id;

    //find the date of order
    $Date= $order->updated_at;

            //$order->product_id = $product->id;
           // $order->quantity = $item['quantity'];
            //$order->total_price = $productTotalPrice;
            //$order->save();

            // Remove the purchased item from the session cart
            unset($cart[$productId]);
        }
    }

    // Update the cart in the session (if you removed purchased items)
    $request->session()->put('cart', $cart);

    // Redirect to a "Thank You" page or wherever you want to go after the purchase
    return view('/orderReceipt', [
        'total' => $totalPrice,
        'order_id'=>$order_id,
        'userName'=>$userName,
        'Date'=>$Date,
]);
}

}


    






