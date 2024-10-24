<?php

namespace App\Http\Resources;

use App\Models\CarBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $startOfDay = Carbon::parse($startTime);
        $endOfDay = Carbon::parse($endTime);
        $carId = $this->id;
        $bookings = CarBooking::where('car_id', $carId)
            ->where(function ($query) use ($startOfDay, $endOfDay) {
                $query->whereBetween('start_time', [$startOfDay, $endOfDay])
                    ->orWhereBetween('end_time', [$startOfDay, $endOfDay]);
            })
            ->orderBy('start_time', 'asc')
            ->get();
        // Array to hold free 1-hour slots
        $freeSlots = [];

        // Start from the beginning of the day and loop in 1-hour intervals
        $currentTime = $startOfDay;

        while ($currentTime->lessThan($endOfDay)) {
            $nextTime = $currentTime->copy()->addHour(); // Get the next hour slot

            // Check if the current 1-hour slot overlaps with any bookings
            $isFree = true;
            foreach ($bookings as $booking) {
                if (
                    // Check if the 1-hour slot overlaps with any booking
                    ($currentTime->between($booking->start_time, $booking->end_time) ||
                        $nextTime->between($booking->start_time, $booking->end_time)) ||
                    (Carbon::parse($booking->start_time)->between($currentTime, $nextTime) ||
                        Carbon::parse($booking->end_time)->between($currentTime, $nextTime))
                ) {
                    $isFree = false;
                    break;
                }
            }

            // If the 1-hour slot is free, add it to the freeSlots array
            if ($isFree) {
                $freeSlots[] = [
                    'start_time' => $currentTime->format('Y-m-d H:i'),
                    'end_time' => $nextTime->format('Y-m-d H:i'),
                ];
            }

            // Move to the next 1-hour interval
            $currentTime->addHour();
        }
        return [
            'id' => $this->id,
            'model' => $this->model,
            'plate' => $this->plate,
            'driver' => $this->whenLoaded('driver', function ($item) {
                return new DriverResource($item);
            }),
            'free_slots' => $freeSlots,
            'comfort_category' => $this->whenLoaded('comfort_category', function ($item) {
                return new ComfortCategoryResource($item);
            }),
        ];
    }
}
