<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\File;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $inventory = Inventory::all();
        return view('backend.inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('backend.inventory.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => ['required'],
            'stock' => ['required'],
            'status' => ['required'],
            'description' => ['required'],
        ]);

        $inventory = Inventory::create($request->only(['item_name', 'stock', 'status', 'description']));
        if ($request->hasFile('photo')) {
            $inventory->addMedia($request->photo)->toMediaCollection('inventory');
        }
        return redirect(route('inventory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Inventory $inventory
     * @return Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Inventory $inventory
     * @return Application|Factory|View
     */
    public function edit(Inventory $inventory)
    {
        return view('backend.inventory.form', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Inventory $inventory
     * @return Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'item_name' => ['required'],
            'stock' => ['required'],
            'status' => ['required'],
            'description' => ['required'],
        ]);

        $inventory->update($request->only(['item_name', 'stock', 'status', 'description']));
        if ($request->hasFile('photo')) {
            $inventory->clearMediaCollection('inventory');
            $inventory->addMedia($request->photo)->toMediaCollection('inventory');
        }
        return redirect(route('inventory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inventory $inventory
     * @return RedirectResponse
     */
    public function destroy(Inventory $inventory): RedirectResponse
    {
        $inventory->delete();
        return redirect()->back();
    }
}
