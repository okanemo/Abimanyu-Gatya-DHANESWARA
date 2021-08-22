<?php

namespace App\Http\Controllers;

use App\Services\SubCategoryService;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->subCategoryService->index();

        return view('subcategory.index', ['subCategories' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->subCategoryService->create();

        return view('subcategory.create', ['categories' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $this->subCategoryService->store($data);
        } catch (Exception $e) {
            return back()
                ->withError($e->getMessage());
        }

        return redirect()
            ->route('sub-category.index')
            ->withSuccess('Data saved successfully!');
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
    public function edit($id)
    {
        $data = $this->subCategoryService->edit($id);

        return view('subcategory.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {
            $this->subCategoryService->update($data, $id);
        } catch (Exception $e) {
            return back()
                ->withError($e->getMessage());
        }

        return redirect()
            ->route('sub-category.index')
            ->withSuccess('Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->subCategoryService->destroy($id);
        } catch (Exception $e) {
            return back()
                ->withError($e->getMessage());
        }

        return redirect()
            ->route('sub-category.index')
            ->withSuccess('Data deleted successfully!');
    }
}
