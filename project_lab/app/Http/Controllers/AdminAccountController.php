<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // @dd(User::all());
        return view('Home.account.view', [
            "title"=>"View All Accounts",
            "users"=> User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Home.account.edit', [
            "title"=>"Edit " .$user->name . " Account",
            "user"=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        // $validateData = [];
        $rules = ([
            'password' => 'required|min:8|max:20',
            'is_admin' => 'required'
        ]);
        

        if($request->name != $user->name){
            $rules['name'] = ['required','max:255','unique:users'];
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }
        
        $validateData = $request->validate($rules);
        $validateData['password'] = Hash::make($validateData['password']);
        
        User::find($user->id)->update($validateData);

        if($validateData['is_admin'] == 0 && auth()->user()->id == $user->id){
            return redirect('/home/view-products')->with('success', 'Your account has been updated to customer, so you dont have any admin function anymore');
        }
        return redirect('/home/view-accounts')->with('success', 'Account user has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        // @dd($user);
        // $user = User::find($user->id);
        $checks = Cart::where('user_id', $user->id)->get();
        if($checks){
            foreach($checks as $check){
                $check->delete();
            }
        }
        
        $user->delete();
        // return redirect()->back();

        // User::destroy($user->id);

        return redirect('/home/view-accounts')->with('success', 'User has been deleted!');
    }
}
