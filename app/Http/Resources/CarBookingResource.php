<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CarBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'start_time' => Carbon::parse($this->start_time)->format('d.m.Y H:i'),
            'end_time' => Carbon::parse($this->end_time)->format('d.m.Y H:i'),
        ];
    }
}
