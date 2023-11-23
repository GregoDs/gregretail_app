<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;


class StripeController extends Controller
{
    public function checkout()
    {
        // Replace 'your-view-name' with the actual name of your Blade view
        return view('buyNowSession');
    }

    public static function filterArrays($array)
    {
        //I HAVE set it to return all arrays with 3 key pairs
        return is_array($array) && count($array) === 3;
    }

    public function session(Request $request)
    {
        // Get from session
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            // Use array_filter with the static method
            $filteredCart = array_filter($cart, [self::class, 'filterArrays']);

            if($filteredCart > 0){

           // dd($filteredCart);

            $totalQuantity = 0;
            $totalPricePerProduct = 0;

            foreach($filteredCart as $item){

            

                $totalQuantity += (int)$item['quantity']; // Convert to integer if needed
                $pricePerProduct = (float)$item['total_price'];

                // Perform operations based on your requirements
    
                $totalPricePerProduct += $pricePerProduct;
                
            }
                   //dd($totalPricePerProduct);

      Stripe::setApiKey(config('stripe.sk'));
      

       // Debug the product name
   // dd($productName);
 // Calculate the total amount (in cents) based on the quantity and price
 $vat=$totalPricePerProduct * 16/100 ;
 $priceAfterVAT = $totalPricePerProduct + $vat;

        $amount = $priceAfterVAT * 100;

        $eachAmount = $amount / $totalQuantity;
     //   dd($amount);
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $eachAmount,  // Amount in cents
                        'product_data' => [
                            'name' => 'Your Order Details',
                            'description' => 'Thank Your For Shopping with us',
                            
                            // Add any other optional fields as needed
                        ],
                    ],
                    'quantity' => $totalQuantity,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect()->away($session->url);
    }
}
        }

        public function success(){
            return ('purchase successfull');
        }
}
