<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\MajorCategory;
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
     * @param StoreRequest $request
     * @return Response
     */
    public function store(StoreRequest $request): Response
    {
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
     * @param UpdateRequest $request
     * @param MajorCategory $majorCategory
     * @return Response
     */
    public function update(UpdateRequest $request, MajorCategory $majorCategory): Response
    {
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
