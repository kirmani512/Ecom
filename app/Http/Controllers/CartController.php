<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
}
