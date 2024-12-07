<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $delivered = Order::where('status', 'Delivered')->get()->count();

        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    public function home()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }

    public function shop()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.shop', compact('product', 'count'));
    }

    public function whyus()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.why', compact('count'));
    }

    public function contact()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.contact', compact( 'count'));
    }

    public function login_home()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }
    public function product_details($id)
    {
        $data = Product::find($id);

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.product_details', compact('data', 'count'));
    }
    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart();

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        return redirect()->back();
    }
    public function mycart()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        }
        return view('home.mycart', compact('count', 'cart'));
    }
    public function remove_cart($id)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $userid = $user->id;

            $cart_item = Cart::where('product_id', $id)->where('user_id', $userid)->first();

            if ($cart_item) {
                $cart_item->delete();
                toastr()->timeOut(5000)->closeButton()->success('Item Removed Successfully');

                return redirect()->back();
            }
        }
    }
    public function update_cart_quantity(Request $request, $id)
{
    $cart_item = Cart::findOrFail($id);

    // Validate the quantity
    $request->validate([
        'qty' => 'required|integer|min:1',
    ]);

    // Update the quantity in the cart
    $cart_item->qty = $request->qty;
    $cart_item->save();

    // Calculate the new total for this item
    $item_total = $cart_item->product->price * $cart_item->qty;

    // Calculate the new overall total
    $user_id = Auth::user()->id;
    $cart = Cart::where('user_id', $user_id)->get();
    $new_total = $cart->sum(function ($item) {
        return $item->product->price * $item->qty;
    });

    // Return the updated values as a JSON response
    return response()->json([
        'item_total' => $item_total,
        'new_total' => $new_total,
        'product_price' => $cart_item->product->price
    ]);
}
    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $cart_item) {
            $order = new Order();

            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart_item->product_id;
            $order->quantity = $cart_item->qty;
            $order->total_price = $cart_item->product->price * $cart_item->qty;
            $order->save();
        }
        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach ($cart_remove as $remove) {

            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton()->success('Order Has been placed Successfully');
        return redirect()->back();
    }

    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Cart::where('user_id', $user)->get()->count();

        $order = Order::where('user_id', $user)->get();

        return view('home.myorders', compact('count', 'order'));
    }

    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }
    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $value * 100,
            "currency" => "pkr",
            "source" => $request->stripeToken,
            "description" => "Test payment from stripe"
        ]);

        $name = Auth::user()->name;

        $address = Auth::user()->address;

        $phone = Auth::user()->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) {
            $order = new Order();

            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->payment_status = "paid";

            $order->save();
        }
        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach ($cart_remove as $remove) {

            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton()->success('Order Has been placed Successfully');
        return redirect('mycart');
    }
}
