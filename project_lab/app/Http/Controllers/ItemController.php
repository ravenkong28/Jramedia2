<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(request('search'));
        //UNTUK SEARCHING
        // if(request('type')){
        //     $type = Type::firstWhere('slug', request('type'));
        // }

        // return view('Home.product.view-product',[
        //     "title" => "View Products",
        //     "items" => Item::all()
        // ]);
        return view('Home.product.view-product',[
            "title" => "View Products",
            "items" => Item::latest()->filter(request(['search', 'type']))
            ->paginate(3)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return ('TEST');
        return view('Home.product.create',[
            "title"=>"Add New Product",
            'types' => Type::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');
        $validateData = $request->validate([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'type_id' => 'required',
            'desc' => 'required|string|min:5',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:15000',
        ]);
        
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('item-image');
        }

        $validateData['slug'] = SlugService::createSlug(Item::class,'slug',$validateData['name']);

        Item::create($validateData);

        return redirect('/home/view-products')->with('success', 'New Item has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        // return $item;

        return view('Home.product.detail',[
            "title"=>"Detail Product of ". $item->name ,
            "item" => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('Home.product.edit',[
            "title"=>"Edit Product of ". $item->name ,
            'item' => $item,
            'types' => Type::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // @dd(Item::where('slug', $item->slug));

        $rules = ([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'type_id' => 'required',
            'desc' => 'required|string|min:5',
            'image' => 'mimes:jpeg,png,jpg,gif|max:15000',
        ]);
        // $temp = SlugService::createSlug(Item::class,'slug',$rules['name']);

        // if($temp != $item->slug){
        //     $rules['slug'] = 'required|unique:items';
        //     $validateData['slug'] = $temp;
        // }
        // else{
        //     $rules['slug'] = $temp['slug'];
        // }

        $validateData = $request->validate($rules);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('item-image');
        }
        
        // $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        
        Item::where('slug', $item->slug)->update($validateData);

        return redirect('/home/view-products')->with('success', 'The item has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if($item->image){
            Storage::delete($item->image);
        }
        // if(Cart::where('$item_id', $item->id)->get()){
        //     $carts = Cart::where('$item_id', $item->id)->get();
        //     foreach($carts as $cart)
        //         $cart->delete();
        // }

        Item::destroy($item->id);
        
        return redirect('/home/view-products')->with('success', 'Item has been deleted!');
    }


    public function checkSlug (Request $request){
        $slug = SlugService::createSlug(Item::class, 'slug', $request->name);

        return response()->json(['slug'=>$slug]);
    }


}
