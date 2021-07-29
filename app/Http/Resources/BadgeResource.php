<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BadgeResource extends JsonResource
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
            'user' => $this->user !== null ? $this->user->fullname : '',
            'badge_id' => $this->badge_id
        ];
    }
}
