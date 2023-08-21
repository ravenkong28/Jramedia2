<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminTransactionController extends Controller
{
    public function index()
    {   
        // dd($transaction);

        return view('Home.transaction.view', [
            "title"=>"All Transaction History",
            "transactions"=> Transaction::all()
        ]);
    }

    public function checkOut(){
        $carts = Cart::all();
        $user = auth()->user();
        $new_id = Str::uuid(32);
        foreach($carts as $cart){
            $transaction = new Transaction();
            $transaction->user_name = $user->name;
            $transaction->item_name = $cart->item->name;
            $transaction->item_price = $cart->item->price;
            $transaction->transaction_id = $new_id;
            $transaction->transaction_date = Carbon::today();
            $transaction->qty =  $cart->qty;
            $transaction->total =  $cart->total;

            $item = Item::where('id', $cart->item_id)->first();
            $item->qty = $item->qty - $cart->qty;
            $item->save();

            $transaction->save();
        }
        Cart::truncate();

        return redirect('/home/my-cart')->with('success', 'Thank you for shopping in Jramedia');

    }

}
