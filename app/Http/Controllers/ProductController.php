<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_query = [];
        $sorted = "";
        if ($request->sort !== null) {
            $slices = explode(' ', $request->sort);
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->sort;
        }
        
        if ($request->category !== null) {
            $products = Product::where('category_id', $request->category)->sortable($sort_query)->paginate(15);
            $total_count = Product::where('category_id', $request->category)->count();
            $category = Category::find($request->category);
        } else {
            $products = Product::sortable($sort_query)->paginate(15);
            $total_count = "";
            $category = null;
        }
        
        $sort = [
             '並び替え' => '', 
             '価格の安い順' => 'price asc',
             '価格の高い順' => 'price desc' 
         ];
        
        $categories = Category::all();
        $major_category_names = Category::pluck('major_category_name')->unique();
        
        
        $search_products = Product::paginate(20);
        $search = $request->input('search');
        $query = Product::query();

        if ($search !== null) {
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }
            $products = $query->paginate(20);
        }
        
        return view('products.index', compact('products', 'category', 'categories', 'major_category_names', 'total_count', 'sort', 'sorted'));
    }
    
    public function favorite(Product $product)
    {
        $user = Auth::user();
        
        if ($user->hasFavorited($product)) {
            $user->unfavorite($product);
        } else {
            $user->favorite($product);
        }
        
        return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $reviews = $product->reviews()->get();
        return view('products.show', compact('product', 'reviews'));
    }

}
