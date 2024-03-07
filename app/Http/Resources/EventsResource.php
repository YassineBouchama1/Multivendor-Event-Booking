<?php

namespace App\Http\Resources;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        // Find seats available
        $countSeats = Reservation::where('event_id', $this->id)->count();

        // Parse start date and end date
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover' => $this->cover,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'organizer_id' => $this->organizer_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'price' => $this->price,
            'places' => $this->places,
            'location' => $this->location,
            'reservation_method' => $this->reservation_method,
            'status' => $this->status,
            'seats' => $countSeats,
            'timeEvent' => $startDate->diffInDays($endDate),

            'dateDay' => $startDate->format('d') . ' ' . $startDate->format('F'),
            'hourEvent' => $startDate->format('H:i'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
