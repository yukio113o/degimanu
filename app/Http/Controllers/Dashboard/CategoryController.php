<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Requests\CatStoreRequest;
use App\Http\Requests\CatUpdateRequest;
use App\MajorCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        $major_categories = MajorCategory::all();

        return view('dashboard.categories.index', compact('categories', 'major_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->major_category_name = $request->input('major_category_name');
        $category->save();

        return redirect("/dashboard/categories");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CatStoreRequest $request
     * @return Response
     */
    public function store(CatStoreRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->major_category_id = $request->input('major_category_id');
        $category->major_category_name = MajorCategory::find($request->input('major_category_id'))->name;
        $category->save();

        return redirect("/dashboard/categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $major_categories = MajorCategory::all();
        return view('dashboard.categories.edit', compact('category', 'major_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CatUpdateRequest $request
     * @param Category $category
     * @return Response
     */
    public function update(CatUpdateRequest $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->major_category_id = $request->input('major_category_id');
        $category->major_category_name = MajorCategory::find($request->input('major_category_id'))->name;
        $category->update();

        return redirect("/dashboard/categories");
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect("/dashboard/categories");
    }
}
