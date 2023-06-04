<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::class::getContent();
        // dd($cartItems);
        if(Auth::attempt()!=false){
        return view('cart', compact('cartItems'));
        }else{
            return view('signup');
        }
    }


    public function addToCart(Request $request)
    {
        \Cart::class::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        Cart::class::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::class::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::class::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function checkoutCart(Request $request)
    {
        $orderAmount = $request->input('totalPrice');
        $orderID = Str::random(8); // Generate a random string with 8 characters
        $srKey = "9A3EC03483556C73714510C507529DF70A1228C83477D1455E0511BD72C5AAB8A6715A414AA48B7C905FCEF45868BD26DA58196EF29C77C194C9F14A4B47456CC6454E9D50B388D6FC5AC91BB08B234A8060FDC85B1CEC32CA036DC907F8A4A635D9CBB9CAA31B42549B8D70B2CE5EDE8274FFB55DABFE92D76BC42D91696FAF";
        $message = 'GFG_DATA';
        $signature = hash_hmac('sha512', $message, $srKey);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://core.paystar.ir/api/pardakht/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "amount": "' . $orderAmount . '",
            "order_id": "' . $orderID . '",
            "callback": "http://localhost/paystarquiz/public/checkout",
            "sign": "' . $signature . '"
        }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 0yovdk2l6e143',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Move this line before curl_close()

        if ($response === false) {
            // Error occurred during the request, handle it accordingly
            $error = curl_error($curl);
            // Handle the error, log it, or display an error message
            return response()->json(['error' => $error], 500);
        }

        if ($httpCode !== 200) {
            // Request was not successful,
            return response()->json(['error' => 'Request failed'], $httpCode);
        }

        curl_close($curl);

        return view('checkout', compact('response'));
    }

}
