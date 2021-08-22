<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->itemService->index();

        return view('item.index', ['items' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->itemService->create();

        return view('item.create', $data);
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
            $this->itemService->store($data);
        } catch (Exception $e) {
            return back()
                ->withError($e->getMessage());
        }

        return redirect()
            ->route('item.index')
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
        $data = $this->itemService->edit($id);

        return view('item.edit', $data);
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
            $this->itemService->update($data, $id);
        } catch (Exception $e) {
            return back()
                ->withError($e->getMessage());
        }

        return redirect()
            ->route('item.index')
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
            $this->itemService->destroy($id);
        } catch (Exception $e) {
            return back()
                ->withError($e->getMessage());
        }

        return redirect()
            ->route('item.index')
            ->withSuccess('Data deleted successfully!');
    }

    public function subCategory(Request $request)
    {
        $data = $request->all();

        $subCategories = $this->itemService->subCategory($data);

        return response()->json([
            'subCategories' => $subCategories
        ]);
    }
}
