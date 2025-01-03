<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\orderItems;
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

        return view('home.contact', compact('count'));
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

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;



        $order = new Order();

        $order->name = $name;
        $order->address = $address;
        $order->phone = $phone;
        $order->user_id = $userid;
        $order->status = 'in progress';
        $order->save();

        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $cartItem) {
            $orderItem = new orderItems();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->qty = $cartItem->qty;
            $orderItem->total = $cartItem->product->price * $cartItem->qty;

            $orderItem->save();
        }
        Cart::where('user_id', $userid)->delete();


        toastr()->timeOut(5000)->closeButton()->success('Order Has been placed Successfully');
        return redirect()->back();
    }

    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Cart::where('user_id', $user)->get()->count();

        $order = Order::with('items.product')->where('user_id', $user)->get();



        return view('home.myorders', compact('order','count'));
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
