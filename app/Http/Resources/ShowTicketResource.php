<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ShowZoneResource;
class ShowTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       
        return [
            'id'=> $this->id,
            // 'zone'=> $this->zone_id,
            'zone'=>new ShowZoneResource( $this->zone),
            'match_countries'=>new ShowMatchCountryResource($this->match_country)

        ];
    }
}
