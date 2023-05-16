<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowMatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'date'=>$this->date,
            'time'=>$this->time,
            'event'=>new ShowEventResource($this->event),
            'venue'=> new ShowVenueResource($this->venue)
            
        ];
    }
}
