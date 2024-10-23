<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarDriverRequest;
use App\Http\Requests\UpdateCarDriverRequest;
use App\Models\CarDriver;

class CarDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarDriverRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CarDriver $carDriver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarDriverRequest $request, CarDriver $carDriver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarDriver $carDriver)
    {
        //
    }
}
