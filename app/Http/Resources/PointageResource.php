<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PointageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => Carbon::parse($this->pointage)->isoFormat("DD-MM-YYYY"),
            'heure' => Carbon::parse($this->pointage)->isoFormat('HH:mm:ss')
        ];
    }
}
