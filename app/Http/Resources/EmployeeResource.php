<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'title' => $this->title,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'role' => $this->role_id
        ];
    }
}