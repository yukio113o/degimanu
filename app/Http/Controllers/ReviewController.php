<?php

namespace App\Http\Controllers;

use App\Review;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
        $review = new Review();
        $review->content = $request->input('content');
        $review->product_id = $product->id;
        $review->user_id = Auth::user()->id;
        $review->save();
        
        return redirect()->route('products.show', $product);
     }

}
