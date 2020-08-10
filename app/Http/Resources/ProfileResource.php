<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $pp = (($this->profile_picture)? $this->profile_picture->link : null);
        return [
            'username' => $this->username,
            'bio' => $this->bio,
            'profile_picture' => $pp,



        ];

    }
}
