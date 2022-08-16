<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\ValidRequest;
use App\MajorCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class MajorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $major_categories = MajorCategory::paginate(15);

        return view('dashboard.major_categories.index', compact('major_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidRequest $request
     * @return Response
     */
    public function store(ValidRequest $request): Response
    {
        //$request->validate([
        //    'name' => 'required|unique:major_categories',
        //    'description' => 'required',
        //],
        //[
        //    'name.required' => '親カテゴリ名は必須です。',
        //    'name.unique' => '親カテゴリ名「' . $request->input('name') . '」は登録済みです。',
        //    'description.required' => '親カテゴリ名の説明は必須です。',
        //]);

        $major_category = new MajorCategory();
        $major_category->name = $request->input('name');
        $major_category->description = $request->input('description');
        $major_category->save();

        return redirect("/dashboard/major_categories");
    }

    /**
     * Display the specified resource.
     *
     * @param MajorCategory $majorCategory
     * @return Response
     */
    public function show(MajorCategory $majorCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MajorCategory $majorCategory
     * @return Response
     */
    public function edit(MajorCategory $majorCategory)
    {
        return view('dashboard.major_categories.edit', compact('major_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ValidRequest $request
     * @param MajorCategory $majorCategory
     * @return Response
     */
    public function update(ValidRequest $request, MajorCategory $majorCategory): Response
    {
        //$request->validate([
        //    'name' => 'required|unique:major_categories',
        //    'description' => 'required',
        //],
        //[
        //    'name.required' => '親カテゴリ名は必須です。',
        //    'name.unique' => '親カテゴリ名「' . $request->input('name') . '」は登録済みです。',
        //    'description.required' => '親カテゴリの説明は必須です。',
        //]);

        $major_category = new MajorCategory();
        $major_category->name = $request->input('name');
        $major_category->description = $request->input('description');
        $major_category->update();

        return redirect("/dashboard/major_categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MajorCategory $major_category
     * @return Response
     */
    public function destroy(MajorCategory $major_category)
    {
        $major_category->delete();

        return redirect("/dashboard/major_categories");
    }
}
