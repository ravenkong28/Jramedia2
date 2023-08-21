<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $user = auth()->user();
        $carts =  Cart::where('user_id', $user->id)->get();

        // dd($carts);
        return view('Home.mycart',[
            "title"=>"My Cart",
            "carts" => $carts,
        ]);
    }

    public function addCart(Request $request, $id){
        $item = Item::where("id", $id)->first();
        // $cart = Cart::findOrFail("item_id", $id)->get();    

        $user = auth()->user();
        $check = Cart::where('user_id', $user->id)->where('item_id', $item->id)->count();
        // dd($check);
        if($check >= 1){
            return redirect('/home/view-products')->with('success', 'The product is already in your cart');
        }
        
        $cart = new Cart();
        $qty = $request->qty;

        $cart->user_id = $user->id;
        $cart->item_id = $item->id;
        // $cart->transaction_date = Carbon::today();
        $cart->qty = $qty;
        $cart->total = $item->price * $qty;

        
        $cart->save();

        return redirect('/home/view-products')->with('success', 'Product Added successfully');
        
    }

    public function update(Request $request, Cart $cart)
    {
        // @dd(Item::where('slug', $item->slug));

        $check = Item::where('id', $cart->item_id)->first();
        
        $validateData = $request->validate([
            'qty' => 'required|numeric|min:1'
        ]);

        if($check->qty - $validateData['qty'] < 0){
            return redirect('/home/my-cart')->with('error', 'Invalid Product Quantity');
        }
        else{
            $validateData['total'] = $validateData['qty'] * $check->price;
            Cart::where('id', $cart->id)->update($validateData);
        }
        

        return redirect('/home/my-cart')->with('success', 'The cart item has been updated!');
    }

    public function destroy(Cart $cart){
        
        Cart::destroy($cart->id);
        return redirect('/home/my-cart')->with('success', 'Your selected product has been deleted!');
    }
}
