<?php

namespace App\Http\Controllers;

use App\Models\LabTest;
use Illuminate\Http\Request;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labtests = LabTest::get();
        return view('backend.lab_test.lab_test',compact('labtests'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cost' => ['required'],
        ]);
        $data = $request->all();
        unset($data['_token']);
        LabTest::create($data);
        alert()->success('Success message', 'Lab Test created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function show(LabTest $labTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function edit(LabTest $labTest)
    {
        return view('backend.lab_test.lab_test_edit',compact('labTest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabTest $labTest)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cost' => ['required'],
        ]);
        $data = $request->all();
        unset($data['_token']);
        $labTest->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabTest $labTest)
    {
        $labTest->forceDelete();
        return redirect()->route('backend.lab_test.lab_test');
    }
}
