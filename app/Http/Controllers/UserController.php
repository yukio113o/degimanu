<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function mypage()
    {
        $user = Auth::user();
        return view('users.mypage', compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        
        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->update();
        
        return redirect()->route('mypage');
    }

    public function edit_password()
    {
        return view('users.edit_password');
    }

    public function update_password()
    {
        $user = Auth::user();
        
        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        } else {
            return redirect()->route('mypage.edit_password');
        }
        
        return redirect()->route('mypage');
        
    }
    
    public function favorite()
    {
        $user = Auth::user();
        $favorites = $user->favorites(Product::class)->get();
        
        return view('users.favorite', compact('favorites'));
    }
}
