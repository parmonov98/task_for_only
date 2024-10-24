<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetAvailableCarsRequest;
use App\Http\Resources\CarBookingCollection;
use App\Http\Resources\CarCollection;
use App\Http\Resources\ComfortCategoryCollection;
use App\Models\Car;
use App\Models\CarBooking;
use App\Models\ComfortCategory;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Get Available Cars
     *
     */
    public function available(GetAvailableCarsRequest $request)
    {

        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $model = $request->input('model');
        $comfort_category = $request->input('comfort_category_id');
        // Query to find cars that are not booked during the given period
        $availableCars = Car::query()
            ->with('driver')
            ->with('comfort_category')
            ->with('bookings')
            ->byBookings($startTime, $endTime)
            ->when($model, function ($query, $model) {
                return $query->where('model', 'LIKE', "%{$model}%");
            })
            ->when($comfort_category, function ($query, $comfortCategoryId) {
                return $query->where('comfort_category_id', $comfortCategoryId);
            })
            ->get();

        // Return the available cars
        return CarCollection::make($availableCars);
    }


    /**
     * Get Cars
     *
     */
    public function list_cars()
    {
        return response()->json([
            'data' => Car::get(['id', 'model'])
        ]);
    }
    /**
     * Get Cars
     *
     */
    public function comfort_categories()
    {
        return ComfortCategoryCollection::make(ComfortCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
